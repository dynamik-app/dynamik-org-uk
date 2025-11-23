<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CompanyController extends Controller
{
    /**
     * Display all companies the authenticated user owns or manages.
     */
    public function index(Request $request): View
    {
        $user = $request->user();

        $ownedCompanies = $user->ownedCompanies()
            ->get()
            ->each(fn ($company) => $company->membership_type = 'Owner');

        $managedCompanies = $user->managedCompanies()
            ->get()
            ->each(function ($company) {
                $company->membership_type = $company->pivot->role
                    ? ucfirst($company->pivot->role)
                    : 'Manager';
            });

        $companies = $ownedCompanies
            ->concat($managedCompanies)
            ->unique('id')
            ->values();

        return view('companies.index', [
            'companies' => $companies,
            'defaultCompanyId' => $user->default_company_id,
        ]);
    }

    /**
     * Show the form for creating a new company profile.
     */
    public function create(): View
    {
        return view('companies.create');
    }

    /**
     * Store a newly created company.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'registered_name' => ['required', 'string', 'max:255'],
            'companies_house_number' => ['nullable', 'string', 'max:50'],
            'registered_status' => ['nullable', 'string', 'max:255'],
            'incorporation_date' => ['nullable', 'date'],
            'registered_address' => ['nullable', 'string'],
            'paye_reference' => ['nullable', 'string', 'max:50'],
            'corporation_tax_utr' => ['nullable', 'string', 'max:50'],
            'vat_number' => ['nullable', 'string', 'max:50'],
        ]);

        Company::create([
            'owner_id' => Auth::id(),
            ...$validated,
        ]);

        return redirect()
            ->route('dashboard')
            ->with('status', 'Company profile created successfully.');
    }

    /**
     * Set the authenticated user's default company.
     */
    public function setDefault(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'company_id' => ['required', 'integer', 'exists:companies,id'],
        ]);

        $user = $request->user();
        $companyId = $validated['company_id'];

        $hasAccess = $user->ownedCompanies()->whereKey($companyId)->exists()
            || $user->managedCompanies()->whereKey($companyId)->exists();

        if (! $hasAccess) {
            abort(403);
        }

        $user->default_company_id = $companyId;
        $user->save();

        return redirect()
            ->route('companies.index')
            ->with('status', 'Default company updated successfully.');
    }
}
