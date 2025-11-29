<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Concerns\HandlesCompanyAccess;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;

class AuthController extends Controller
{
    use HandlesCompanyAccess;

    /**
     * Register a new user and return an API token.
     */
    public function register(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user,
            'default_company' => null,
            'companies' => [],
            'requires_company' => true,
        ], 201);
    }

    /**
     * Authenticate an existing user and return an API token.
     */
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid credentials provided.',
            ], 401);
        }

        /** @var User $user */
        $user = User::where('email', $credentials['email'])->first();

        $defaultCompany = $this->resolveDefaultCompany($user);
        $companies = $this->accessibleCompanies($user);

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user,
            'default_company' => $defaultCompany ? CompanyResource::make($defaultCompany) : null,
            'companies' => CompanyResource::collection($companies),
            'requires_company' => $companies->isEmpty(),
        ]);
    }

    /**
     * Return the authenticated user for the current token.
     */
    public function me(Request $request): JsonResponse
    {
        $user = $request->user();
        $defaultCompany = $user->defaultCompany && $this->userHasCompanyAccess($user, $user->defaultCompany)
            ? $user->defaultCompany
            : null;

        return response()->json([
            'user' => $user,
            'default_company' => $defaultCompany ? CompanyResource::make($defaultCompany) : null,
            'companies' => CompanyResource::collection($this->accessibleCompanies($user)),
            'requires_company' => $this->accessibleCompanies($user)->isEmpty(),
        ]);
    }

    /**
     * Revoke the current API token.
     */
    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()?->delete();

        return response()->json([
            'message' => 'Successfully logged out.',
        ]);
    }

    private function resolveDefaultCompany(User $user): ?Company
    {
        $companies = $this->accessibleCompanies($user);
        $defaultCompany = $user->defaultCompany;

        if ($defaultCompany && ! $this->userHasCompanyAccess($user, $defaultCompany)) {
            $user->update(['default_company_id' => null]);
            $defaultCompany = null;
        }

        if (! $defaultCompany && $companies->isNotEmpty()) {
            $defaultCompany = $companies->first();
            $user->update(['default_company_id' => $defaultCompany->id]);
        }

        return $defaultCompany;
    }
}
