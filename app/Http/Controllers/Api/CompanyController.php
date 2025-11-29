<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Concerns\HandlesCompanyAccess;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    use HandlesCompanyAccess;

    public function index(Request $request)
    {
        $companies = $this->accessibleCompanies($request->user());

        return CompanyResource::collection($companies)
            ->additional([
                'default_company_id' => $request->user()->default_company_id,
            ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'registered_name' => ['required', 'string', 'max:255'],
            'registered_status' => ['nullable', 'string', 'max:255'],
            'registered_address' => ['nullable', 'string'],
            'paye_reference' => ['nullable', 'string', 'max:255'],
            'corporation_tax_utr' => ['nullable', 'string', 'max:255'],
            'vat_number' => ['nullable', 'string', 'max:255'],
        ]);

        /** @var User $user */
        $user = $request->user();

        $company = Company::create(array_merge($validated, [
            'owner_id' => $user->id,
        ]));

        $company->managers()->syncWithoutDetaching([
            $user->id => [
                'role' => 'owner',
                'assigned_by' => $user->id,
            ],
        ]);

        if (! $user->default_company_id) {
            $user->update(['default_company_id' => $company->id]);
        }

        return CompanyResource::make($company)
            ->response()
            ->setStatusCode(201);
    }

    public function addMember(Request $request, Company $company): JsonResponse
    {
        $this->authorizeCompanyAccess($request->user(), $company);

        if ($company->owner_id !== $request->user()->id) {
            abort(403, 'Only the company owner can add members.');
        }

        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'role' => ['nullable', 'string', 'max:50'],
        ]);

        $company->managers()->syncWithoutDetaching([
            $validated['user_id'] => [
                'role' => $validated['role'] ?? 'manager',
                'assigned_by' => $request->user()->id,
            ],
        ]);

        return response()->json([
            'message' => 'User granted access to the company.',
        ], 201);
    }

    public function select(Request $request, Company $company): JsonResponse
    {
        $this->authorizeCompanyAccess($request->user(), $company);

        $request->user()->update([
            'default_company_id' => $company->id,
        ]);

        return response()->json([
            'message' => 'Default company selected.',
            'company' => CompanyResource::make($company),
        ]);
    }
}
