<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CertificateController extends Controller
{
    /**
     * Display all certificates for the user's default company.
     */
    public function index(Request $request): RedirectResponse|View
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return redirect()
                ->route('companies.index')
                ->with('status', 'Select a default company before managing certificates.');
        }

        $certificates = Certificate::with(['type', 'client', 'project'])
            ->where('company_id', $company->id)
            ->latest()
            ->get();

        return view('certificates.index', [
            'company' => $company,
            'certificates' => $certificates,
        ]);
    }

    /**
     * Show the create certificate wizard for the user's default company.
     */
    public function create(Request $request): RedirectResponse|View
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return redirect()
                ->route('companies.index')
                ->with('status', 'Select a default company before creating certificates.');
        }

        return view('certificates.create', [
            'company' => $company,
        ]);
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
