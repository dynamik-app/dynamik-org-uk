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
}
