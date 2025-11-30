<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PurchaseOrderController extends Controller
{
    public function index(Request $request): RedirectResponse|View
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return redirect()->route('companies.index')->with('status', 'Select a default company before managing purchase orders.');
        }

        $purchaseOrders = $company->purchaseOrders()->with(['client', 'project'])->latest()->get();

        return view('purchase-orders.index', [
            'company' => $company,
            'purchaseOrders' => $purchaseOrders,
        ]);
    }

    public function create(Request $request): RedirectResponse|View
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return redirect()->route('companies.index')->with('status', 'Select a default company before managing purchase orders.');
        }

        return view('purchase-orders.manage', [
            'company' => $company,
            'clients' => $company->clients()->orderBy('name')->get(),
            'projects' => $company->projects()->with('client')->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return redirect()->route('companies.index')->with('status', 'Select a default company before managing purchase orders.');
        }

        $validated = $request->validate([
            'client_id' => ['required', 'exists:clients,id'],
            'project_id' => ['nullable', 'exists:projects,id'],
            'number' => ['required', 'string', 'max:255'],
            'issue_date' => ['nullable', 'date'],
            'due_date' => ['nullable', 'date', 'after_or_equal:issue_date'],
            'status' => ['required', Rule::in(['draft', 'sent', 'accepted', 'closed'])],
            'total' => ['required', 'numeric', 'gte:0'],
            'notes' => ['nullable', 'string'],
        ]);

        $client = $company->clients()->findOrFail($validated['client_id']);

        if (! empty($validated['project_id'])) {
            $project = Project::findOrFail($validated['project_id']);

            if ($project->company_id !== $company->id) {
                return redirect()->back()->withErrors(['project_id' => 'Project must belong to this company.'])->withInput();
            }

            if ($project->client_id !== $client->id) {
                return redirect()->back()->withErrors(['project_id' => 'Project must belong to the selected client.'])->withInput();
            }
        }

        $company->purchaseOrders()->create($validated);

        return redirect()->route('purchase-orders.index')->with('status', 'Purchase order created successfully.');
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
}
