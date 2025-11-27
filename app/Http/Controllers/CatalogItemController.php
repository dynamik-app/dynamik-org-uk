<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CatalogItemController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $company = $this->getAccessibleDefaultCompany($request);

        if (! $company) {
            return response()->json([
                'message' => 'Select a default company before adding products or services.',
            ], 422);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', Rule::in(['product', 'service'])],
            'unit_price' => ['required', 'numeric', 'gte:0'],
            'description' => ['nullable', 'string'],
        ]);

        $item = $company->catalogItems()->create($validated);

        return response()->json(['item' => $item], 201);
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
