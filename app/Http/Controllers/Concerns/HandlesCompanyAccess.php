<?php

namespace App\Http\Controllers\Concerns;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

trait HandlesCompanyAccess
{
    protected function getAccessibleDefaultCompany(Request $request): ?Company
    {
        $company = $request->user()->defaultCompany;

        if (! $company) {
            return null;
        }

        return $this->userHasCompanyAccess($request->user(), $company) ? $company : null;
    }

    protected function accessibleCompanies(User $user): Collection
    {
        return $user->ownedCompanies()->get()
            ->merge($user->managedCompanies()->get())
            ->unique('id')
            ->values();
    }

    protected function userHasCompanyAccess(User $user, Company $company): bool
    {
        return $user->ownedCompanies()->whereKey($company->id)->exists()
            || $user->managedCompanies()->whereKey($company->id)->exists();
    }

    protected function authorizeCompanyAccess(User $user, Company $company): void
    {
        if (! $this->userHasCompanyAccess($user, $company)) {
            abort(403);
        }
    }
}
