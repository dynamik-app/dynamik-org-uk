<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Invoice;
use App\Models\Project;
use App\Support\InvoicePdfBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class InvoiceController extends Controller
{
    public function index(Request $request): RedirectResponse|View
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return redirect()
                ->route('companies.index')
                ->with('status', 'Select a default company before managing invoices.');
        }

        $invoices = $company->invoices()
            ->with(['client', 'project'])
            ->latest()
            ->get();

        return view('invoices.index', [
            'company' => $company,
            'invoices' => $invoices,
        ]);
    }

    public function create(Request $request): RedirectResponse|View
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return redirect()
                ->route('companies.index')
                ->with('status', 'Select a default company before managing invoices.');
        }

        return view('invoices.manage', [
            'company' => $company,
            'clients' => $company->clients()->orderBy('name')->get(),
            'projects' => $company->projects()->with('client')->orderBy('name')->get(),
            'invoice' => new Invoice([
                'company_id' => $company->id,
                'issue_date' => now()->toDateString(),
                'status' => 'draft',
            ]),
            'catalogItems' => $company->catalogItems()->orderBy('name')->get(),
            'statuses' => Invoice::STATUSES,
            'initialItems' => collect(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return redirect()
                ->route('companies.index')
                ->with('status', 'Select a default company before managing invoices.');
        }

        $validated = $this->validateInvoice($request);

        $client = $company->clients()->findOrFail($validated['client_id']);

        if (! empty($validated['project_id'])) {
            $this->ensureProjectMatchesClient($validated['project_id'], $client->id, $company->id);
        }

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

        $invoice = $company->invoices()->create([
            'client_id' => $client->id,
            'project_id' => $validated['project_id'] ?? null,
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

        return redirect()
            ->route('invoices.show', $invoice)
            ->with('status', 'Invoice created successfully.');
    }

    public function show(Request $request, Invoice $invoice): View
    {
        $this->authorizeCompanyAccess($request->user(), $invoice->company);

        return view('invoices.show', [
            'invoice' => $invoice->load(['client', 'company', 'project', 'items.catalogItem']),
        ]);
    }

    public function edit(Request $request, Invoice $invoice): View
    {
        $this->authorizeCompanyAccess($request->user(), $invoice->company);

        $company = $invoice->company;

        return view('invoices.manage', [
            'company' => $company,
            'clients' => $company->clients()->orderBy('name')->get(),
            'projects' => $company->projects()->with('client')->orderBy('name')->get(),
            'invoice' => $invoice,
            'catalogItems' => $company->catalogItems()->orderBy('name')->get(),
            'statuses' => Invoice::STATUSES,
            'initialItems' => $invoice->items,
        ]);
    }

    public function update(Request $request, Invoice $invoice): RedirectResponse
    {
        $this->authorizeCompanyAccess($request->user(), $invoice->company);

        $validated = $this->validateInvoice($request);

        $company = $invoice->company;
        $client = $company->clients()->findOrFail($validated['client_id']);

        if (! empty($validated['project_id'])) {
            $this->ensureProjectMatchesClient($validated['project_id'], $client->id, $company->id);
        }

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

        $invoice->update([
            'client_id' => $client->id,
            'project_id' => $validated['project_id'] ?? null,
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

        return redirect()
            ->route('invoices.edit', $invoice)
            ->with('status', 'Invoice updated successfully.');
    }

    public function download(Request $request, Invoice $invoice): Response
    {
        $this->authorizeCompanyAccess($request->user(), $invoice->company);

        $invoice->load(['client', 'company', 'items']);

        $pdfContent = InvoicePdfBuilder::render($invoice);

        return response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="'.$invoice->number.'.pdf"',
        ]);
    }

    private function validateInvoice(Request $request): array
    {
        return $request->validate([
            'client_id' => ['required', 'exists:clients,id'],
            'project_id' => ['nullable', 'exists:projects,id'],
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

    private function ensureProjectMatchesClient(int $projectId, int $clientId, int $companyId): void
    {
        $project = Project::findOrFail($projectId);

        if ($project->client_id !== $clientId || $project->company_id !== $companyId) {
            abort(422, 'Selected project must belong to the chosen client and company.');
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
