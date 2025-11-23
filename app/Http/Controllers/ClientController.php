<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientController extends Controller
{
    /**
     * Display a listing of clients for the user's default company.
     */
    public function index(Request $request): RedirectResponse|View
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return redirect()
                ->route('companies.index')
                ->with('status', 'Select a default company before managing clients.');
        }

        $clients = $company->clients()
            ->withCount('projects')
            ->orderBy('name')
            ->get();

        return view('clients.index', [
            'company' => $company,
            'clients' => $clients,
        ]);
    }

    /**
     * Show the form for creating a new client.
     */
    public function create(Request $request): RedirectResponse|View
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return redirect()
                ->route('companies.index')
                ->with('status', 'Select a default company before managing clients.');
        }

        return view('clients.manage', [
            'company' => $company,
            'client' => new Client(['company_id' => $company->id]),
        ]);
    }

    /**
     * Store a newly created client in storage.
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return redirect()
                ->route('companies.index')
                ->with('status', 'Select a default company before managing clients.');
        }

        $validated = $request->validate($this->clientRules());

        $client = $company->clients()->create($validated);

        if ($request->wantsJson()) {
            return response()->json(['client' => $client], 201);
        }

        return redirect()
            ->route('clients.index')
            ->with('status', 'Client created successfully.');
    }

    /**
     * Show the form for editing the specified client.
     */
    public function edit(Request $request, Client $client): View
    {
        $this->authorizeCompanyAccess($request->user(), $client->company);

        return view('clients.manage', [
            'company' => $client->company,
            'client' => $client->load('projects'),
        ]);
    }

    /**
     * Update the specified client in storage.
     */
    public function update(Request $request, Client $client): RedirectResponse
    {
        $this->authorizeCompanyAccess($request->user(), $client->company);

        $validated = $request->validate($this->clientRules());

        $client->update($validated);

        return redirect()
            ->route('clients.edit', $client)
            ->with('status', 'Client updated successfully.');
    }

    /**
     * Validation rules for client data.
     *
     * @return array<string, array<int, string>>
     */
    private function clientRules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'contact_name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'postcode' => ['nullable', 'string', 'max:20'],
        ];
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
