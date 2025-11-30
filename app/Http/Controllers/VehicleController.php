<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VehicleController extends Controller
{
    public function index(Request $request): RedirectResponse|View
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return redirect()->route('companies.index')->with('status', 'Select a default company before managing vehicles.');
        }

        return view('vehicles.index', [
            'company' => $company,
            'vehicles' => $company->vehicles()->orderBy('name')->get(),
        ]);
    }

    public function create(Request $request): RedirectResponse|View
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return redirect()->route('companies.index')->with('status', 'Select a default company before managing vehicles.');
        }

        return view('vehicles.manage', [
            'company' => $company,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return redirect()->route('companies.index')->with('status', 'Select a default company before managing vehicles.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'registration_number' => ['nullable', 'string', 'max:50'],
            'make' => ['nullable', 'string', 'max:255'],
            'model' => ['nullable', 'string', 'max:255'],
            'year' => ['nullable', 'integer', 'min:1900', 'max:' . (int) date('Y') + 1],
            'notes' => ['nullable', 'string'],
        ]);

        $company->vehicles()->create($validated);

        return redirect()->route('vehicles.index')->with('status', 'Vehicle added successfully.');
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
