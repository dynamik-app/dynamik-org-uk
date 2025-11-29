<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InvoiceResource;
use App\Models\Company;
use App\Models\Invoice;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return response()->json([
                'message' => 'Select a default company before managing invoices.',
            ], 422);
        }

        $invoices = $company->invoices()
            ->with(['client', 'company'])
            ->latest()
            ->paginate(20);

        return InvoiceResource::collection($invoices);
    }

    public function store(Request $request): JsonResponse
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return response()->json([
                'message' => 'Select a default company before managing invoices.',
            ], 422);
        }

        $validated = $this->validateInvoice($request);
        $client = $company->clients()->findOrFail($validated['client_id']);

        $items = $this->prepareItems(collect($validated['items']), $company);
        $totals = $this->calculateTotals($items);

        $invoice = $company->invoices()->create([
            'client_id' => $client->id,
            'number' => $this->generateInvoiceNumber($company),
            'issue_date' => $validated['issue_date'],
            'due_date' => $validated['due_date'] ?? null,
            'status' => $validated['status'],
            'notes' => $validated['notes'] ?? null,
            'subtotal' => $totals['subtotal'],
            'tax_total' => $totals['tax_total'],
            'total' => $totals['total'],
        ]);

        $invoice->items()->createMany($items->map(function ($item) {
            return Arr::only($item, [
                'catalog_item_id',
                'item_type',
                'name',
                'description',
                'quantity',
                'tax_rate',
                'unit_price',
                'line_tax',
                'line_total',
            ]);
        })->all());

        $invoice->load(['client', 'company', 'items']);

        return InvoiceResource::make($invoice)
            ->response()
            ->setStatusCode(201);
    }

    public function show(Request $request, Invoice $invoice)
    {
        $this->authorizeCompanyAccess($request->user(), $invoice->company);

        return InvoiceResource::make(
            $invoice->load(['client', 'company', 'items'])
        );
    }

    public function update(Request $request, Invoice $invoice): JsonResponse
    {
        $this->authorizeCompanyAccess($request->user(), $invoice->company);

        $validated = $this->validateInvoice($request);

        $company = $invoice->company;
        $client = $company->clients()->findOrFail($validated['client_id']);

        $items = $this->prepareItems(collect($validated['items']), $company);
        $totals = $this->calculateTotals($items);

        $invoice->update([
            'client_id' => $client->id,
            'issue_date' => $validated['issue_date'],
            'due_date' => $validated['due_date'] ?? null,
            'status' => $validated['status'],
            'notes' => $validated['notes'] ?? null,
            'subtotal' => $totals['subtotal'],
            'tax_total' => $totals['tax_total'],
            'total' => $totals['total'],
        ]);

        $invoice->items()->delete();
        $invoice->items()->createMany($items->map(function ($item) {
            return Arr::only($item, [
                'catalog_item_id',
                'item_type',
                'name',
                'description',
                'quantity',
                'tax_rate',
                'unit_price',
                'line_tax',
                'line_total',
            ]);
        })->all());

        $invoice->load(['client', 'company', 'items']);

        return InvoiceResource::make($invoice)
            ->response();
    }

    private function prepareItems(Collection $items, Company $company): Collection
    {
        return $items->map(function ($item) use ($company) {
            if (! empty($item['catalog_item_id'])) {
                $this->ensureCatalogItemBelongsToCompany($company, (int) $item['catalog_item_id']);
            }

            $quantity = (float) $item['quantity'];
            $unitPrice = (float) $item['unit_price'];
            $taxRate = (float) ($item['tax_rate'] ?? 0);
            $lineTotal = round($quantity * $unitPrice, 2);
            $lineTax = round($lineTotal * ($taxRate / 100), 2);

            return array_merge($item, [
                'line_total' => $lineTotal,
                'line_tax' => $lineTax,
            ]);
        });
    }

    private function validateInvoice(Request $request): array
    {
        return $request->validate([
            'client_id' => ['required', 'exists:clients,id'],
            'issue_date' => ['required', 'date'],
            'due_date' => ['nullable', 'date', 'after_or_equal:issue_date'],
            'status' => ['required', Rule::in(Invoice::STATUSES)],
            'notes' => ['nullable', 'string'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.catalog_item_id' => ['nullable', 'exists:catalog_items,id'],
            'items.*.item_type' => ['required', 'in:product,service,custom'],
            'items.*.name' => ['required', 'string', 'max:255'],
            'items.*.description' => ['nullable', 'string'],
            'items.*.quantity' => ['required', 'numeric', 'gt:0'],
            'items.*.tax_rate' => ['nullable', 'numeric', 'gte:0'],
            'items.*.unit_price' => ['required', 'numeric', 'gte:0'],
        ]);
    }

    private function calculateTotals(Collection $items): array
    {
        $subtotal = $items->sum('line_total');
        $taxTotal = $items->sum('line_tax');

        return [
            'subtotal' => $subtotal,
            'tax_total' => $taxTotal,
            'total' => $subtotal + $taxTotal,
        ];
    }

    private function generateInvoiceNumber(Company $company): string
    {
        $nextCount = $company->invoices()->count() + 1;

        return sprintf('INV-%s-%04d', now()->format('Y'), $nextCount);
    }

    private function ensureCatalogItemBelongsToCompany(Company $company, int $catalogItemId): void
    {
        if (! $company->catalogItems()->whereKey($catalogItemId)->exists()) {
            abort(403, 'You cannot use items that belong to another company.');
        }
    }

    private function getAccessibleDefaultCompany(Request $request): ?Company
    {
        $company = $request->user()->defaultCompany;

        if (! $company) {
            return null;
        }

        return $this->userHasCompanyAccess($request->user(), $company) ? $company : null;
    }

    private function userHasCompanyAccess($user, Company $company): bool
    {
        return $user->ownedCompanies()->whereKey($company->id)->exists()
            || $user->managedCompanies()->whereKey($company->id)->exists();
    }

    private function authorizeCompanyAccess($user, Company $company): void
    {
        if (! $this->userHasCompanyAccess($user, $company)) {
            abort(403);
        }
    }
}
