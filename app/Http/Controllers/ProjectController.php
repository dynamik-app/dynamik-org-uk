<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Display all projects for the user's default company.
     */
    public function index(Request $request): RedirectResponse|View
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return redirect()
                ->route('companies.index')
                ->with('status', 'Select a default company before managing projects.');
        }

        $projects = Project::with('client')
            ->whereHas('client', fn ($query) => $query->where('company_id', $company->id))
            ->orderBy('name')
            ->get();

        $clients = $company->clients()->orderBy('name')->get();

        return view('projects.index', [
            'company' => $company,
            'projects' => $projects,
            'clients' => $clients,
        ]);
    }

    /**
     * Show the form for creating a new project for the user's default company.
     */
    public function create(Request $request): RedirectResponse|View
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return redirect()
                ->route('companies.index')
                ->with('status', 'Select a default company before managing projects.');
        }

        $clients = $company->clients()->orderBy('name')->get();

        return view('projects.create', [
            'company' => $company,
            'clients' => $clients,
        ]);
    }

    /**
     * Store a newly created project for the given client.
     */
    public function store(Request $request, Client $client): RedirectResponse
    {
        $this->authorizeCompanyAccess($request->user(), $client->company);

        $validated = $request->validate($this->projectRules());

        $client->projects()->create([
            'name' => $validated['project_name'],
            'address' => $validated['project_address'] ?? null,
            'city' => $validated['project_city'] ?? null,
            'postcode' => $validated['project_postcode'] ?? null,
            'notes' => $validated['project_notes'] ?? null,
        ]);

        return redirect()
            ->route('clients.edit', $client)
            ->with('status', 'Project added successfully.');
    }

    /**
     * Store a project for the user's default company with a chosen client.
     */
    public function storeForDefaultCompany(Request $request): RedirectResponse
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return redirect()
                ->route('companies.index')
                ->with('status', 'Select a default company before managing projects.');
        }

        $validated = $request->validate($this->projectCreationRules($company));

        Project::create([
            'client_id' => $validated['client_id'],
            'name' => $validated['name'],
            'address' => $validated['address'] ?? null,
            'city' => $validated['city'] ?? null,
            'postcode' => $validated['postcode'] ?? null,
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()
            ->route('projects.index')
            ->with('status', 'Project created successfully.');
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy(Request $request, Project $project): RedirectResponse
    {
        $this->authorizeCompanyAccess($request->user(), $project->client->company);

        $project->delete();

        return redirect()
            ->route('clients.edit', $project->client)
            ->with('status', 'Project removed successfully.');
    }

    /**
     * Validation rules for project data.
     *
     * @return array<string, array<int, string>>
     */
    private function projectRules(): array
    {
        return [
            'project_name' => ['required', 'string', 'max:255'],
            'project_address' => ['nullable', 'string', 'max:255'],
            'project_city' => ['nullable', 'string', 'max:255'],
            'project_postcode' => ['nullable', 'string', 'max:20'],
            'project_notes' => ['nullable', 'string'],
        ];
    }

    /**
     * Validation rules for project creation from the projects index.
     *
     * @return array<string, array<int, string|Rule>>
     */
    private function projectCreationRules(Company $company): array
    {
        return [
            'client_id' => ['required', 'integer', Rule::exists('clients', 'id')->where('company_id', $company->id)],
            'name' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'postcode' => ['nullable', 'string', 'max:20'],
            'notes' => ['nullable', 'string'],
        ];
    }

    private function authorizeCompanyAccess($user, Company $company): void
    {
        if (! $this->userHasCompanyAccess($user, $company)) {
            abort(403);
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
}
