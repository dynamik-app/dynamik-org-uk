<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Concerns\HandlesCompanyAccess;
use App\Http\Controllers\Controller;
use App\Http\Resources\EstimateResource;
use App\Models\Company;
use App\Models\Estimate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;

class EstimateController extends Controller
{
    use HandlesCompanyAccess;

    public function index(Request $request)
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return response()->json([
                'message' => 'Select a default company before managing estimates.',
            ], 422);
        }

        $estimates = $company->estimates()
            ->with(['client', 'company'])
            ->latest()
            ->paginate(20);

        return EstimateResource::collection($estimates);
    }

    public function store(Request $request): JsonResponse
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return response()->json([
                'message' => 'Select a default company before managing estimates.',
            ], 422);
        }

        $validated = $this->validateEstimate($request);
        $client = $company->clients()->findOrFail($validated['client_id']);

        $items = $this->prepareItems(collect($validated['items']), $company);
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

        $estimate->load(['client', 'company', 'items']);

        return EstimateResource::make($estimate)
            ->response()
            ->setStatusCode(201);
    }

    public function show(Request $request, Estimate $estimate)
    {
        $this->authorizeCompanyAccess($request->user(), $estimate->company);

        return EstimateResource::make(
            $estimate->load(['client', 'company', 'items'])
        );
    }

    public function update(Request $request, Estimate $estimate): JsonResponse
    {
        $this->authorizeCompanyAccess($request->user(), $estimate->company);

        $validated = $this->validateEstimate($request);

        $company = $estimate->company;
        $client = $company->clients()->findOrFail($validated['client_id']);

        $items = $this->prepareItems(collect($validated['items']), $company);
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

        $estimate->load(['client', 'company', 'items']);

        return EstimateResource::make($estimate)
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
}
