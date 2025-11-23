<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
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

    private function authorizeCompanyAccess($user, Company $company): void
    {
        $hasAccess = $user->ownedCompanies()->whereKey($company->id)->exists()
            || $user->managedCompanies()->whereKey($company->id)->exists();

        if (! $hasAccess) {
            abort(403);
        }
    }
}
