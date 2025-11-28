<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Estimate;
use App\Support\EstimatePdfBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class EstimateController extends Controller
{
    public function index(Request $request): RedirectResponse|View
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return redirect()
                ->route('companies.index')
                ->with('status', 'Select a default company before managing estimates.');
        }

        $estimates = $company->estimates()
            ->with('client')
            ->latest()
            ->get();

        return view('estimates.index', [
            'company' => $company,
            'estimates' => $estimates,
        ]);
    }

    public function create(Request $request): RedirectResponse|View
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return redirect()
                ->route('companies.index')
                ->with('status', 'Select a default company before managing estimates.');
        }

        return view('estimates.manage', [
            'company' => $company,
            'clients' => $company->clients()->orderBy('name')->get(),
            'estimate' => new Estimate([
                'company_id' => $company->id,
                'issue_date' => now()->toDateString(),
                'status' => 'draft',
            ]),
            'catalogItems' => $company->catalogItems()->orderBy('name')->get(),
            'statuses' => Estimate::STATUSES,
            'initialItems' => collect(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return redirect()
                ->route('companies.index')
                ->with('status', 'Select a default company before managing estimates.');
        }

        $validated = $this->validateEstimate($request);

        $client = $company->clients()->findOrFail($validated['client_id']);

        $items = collect($validated['items'] ?? [])->map(function ($item) use ($company) {
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

        $totals = $this->calculateTotals($items);

        $estimate = $company->estimates()->create([
            'client_id' => $client->id,
            'number' => $this->generateEstimateNumber($company),
            'issue_date' => $validated['issue_date'],
            'due_date' => $validated['due_date'] ?? null,
            'status' => $validated['status'],
            'notes' => $validated['notes'] ?? null,
            'subtotal' => $totals['subtotal'],
            'tax_total' => $totals['tax_total'],
            'total' => $totals['total'],
        ]);

        $estimate->items()->createMany($items->map(function ($item) {
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

        return redirect()
            ->route('estimates.show', $estimate)
            ->with('status', 'Estimate created successfully.');
    }

    public function show(Request $request, Estimate $estimate): View
    {
        $this->authorizeCompanyAccess($request->user(), $estimate->company);

        return view('estimates.show', [
            'estimate' => $estimate->load(['client', 'company', 'items.catalogItem']),
        ]);
    }

    public function edit(Request $request, Estimate $estimate): View
    {
        $this->authorizeCompanyAccess($request->user(), $estimate->company);

        $company = $estimate->company;

        return view('estimates.manage', [
            'company' => $company,
            'clients' => $company->clients()->orderBy('name')->get(),
            'estimate' => $estimate,
            'catalogItems' => $company->catalogItems()->orderBy('name')->get(),
            'statuses' => Estimate::STATUSES,
            'initialItems' => $estimate->items,
        ]);
    }

    public function update(Request $request, Estimate $estimate): RedirectResponse
    {
        $this->authorizeCompanyAccess($request->user(), $estimate->company);

        $validated = $this->validateEstimate($request);

        $company = $estimate->company;
        $client = $company->clients()->findOrFail($validated['client_id']);

        $items = collect($validated['items'] ?? [])->map(function ($item) use ($company) {
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

        $totals = $this->calculateTotals($items);

        $estimate->update([
            'client_id' => $client->id,
            'issue_date' => $validated['issue_date'],
            'due_date' => $validated['due_date'] ?? null,
            'status' => $validated['status'],
            'notes' => $validated['notes'] ?? null,
            'subtotal' => $totals['subtotal'],
            'tax_total' => $totals['tax_total'],
            'total' => $totals['total'],
        ]);

        $estimate->items()->delete();
        $estimate->items()->createMany($items->map(function ($item) {
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

        return redirect()
            ->route('estimates.edit', $estimate)
            ->with('status', 'Estimate updated successfully.');
    }

    public function download(Request $request, Estimate $estimate): Response
    {
        $this->authorizeCompanyAccess($request->user(), $estimate->company);

        $estimate->load(['client', 'company', 'items']);

        $pdfContent = EstimatePdfBuilder::render($estimate);

        return response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="'.$estimate->number.'.pdf"',
        ]);
    }

    private function validateEstimate(Request $request): array
    {
        return $request->validate([
            'client_id' => ['required', 'exists:clients,id'],
            'issue_date' => ['required', 'date'],
            'due_date' => ['nullable', 'date', 'after_or_equal:issue_date'],
            'status' => ['required', Rule::in(Estimate::STATUSES)],
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

    private function calculateTotals($items): array
    {
        $subtotal = $items->sum('line_total');
        $taxTotal = $items->sum('line_tax');

        return [
            'subtotal' => $subtotal,
            'tax_total' => $taxTotal,
            'total' => $subtotal + $taxTotal,
        ];
    }

    private function generateEstimateNumber(Company $company): string
    {
        $nextCount = $company->estimates()->count() + 1;

        return sprintf('EST-%s-%04d', now()->format('Y'), $nextCount);
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
