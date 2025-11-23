<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyInvitation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CompanyInvitationController extends Controller
{
    /**
     * Show the form for sending a new company invitation.
     */
    public function create(Request $request): View
    {
        $user = $request->user();

        $availableCompanies = $user->ownedCompanies
            ->merge($user->managedCompanies)
            ->unique('id');

        return view('companies.invitations.create', [
            'companies' => $availableCompanies,
        ]);
    }

    /**
     * Store a new invitation for a company manager.
     */
    public function store(Request $request): RedirectResponse
    {
        $user = $request->user();

        $companyIds = $user->ownedCompanies
            ->merge($user->managedCompanies)
            ->pluck('id')
            ->unique()
            ->toArray();

        if (empty($companyIds)) {
            return redirect()
                ->route('companies.create')
                ->withErrors(['company_id' => 'Create a company before sending invitations.']);
        }

        $validated = $request->validate([
            'company_id' => ['required', 'integer', 'in:' . implode(',', $companyIds)],
            'email' => ['required', 'email'],
            'role' => ['required', 'string', 'max:50'],
        ]);

        CompanyInvitation::create([
            'company_id' => $validated['company_id'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'invited_by' => $user->id,
            'token' => Str::uuid()->toString(),
        ]);

        return redirect()
            ->route('dashboard')
            ->with('status', 'Invitation sent successfully. Share the acceptance link with the invitee.');
    }

    /**
     * Show the form to accept an invitation.
     */
    public function showAcceptForm(Request $request): View
    {
        return view('companies.invitations.accept', [
            'token' => $request->query('token', ''),
        ]);
    }

    /**
     * Accept a company invitation using a token.
     */
    public function accept(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'token' => ['required', 'string'],
        ]);

        $invitation = CompanyInvitation::where('token', $validated['token'])->first();

        if (! $invitation) {
            return back()->withErrors(['token' => 'Invitation not found. Please verify the link.']);
        }

        if ($invitation->accepted_at) {
            return back()->withErrors(['token' => 'This invitation has already been accepted.']);
        }

        if ($invitation->email !== $request->user()->email) {
            return back()->withErrors(['token' => 'This invitation was not issued for your account email.']);
        }

        $company = Company::find($invitation->company_id);

        if (! $company) {
            return back()->withErrors(['token' => 'The company associated with this invitation no longer exists.']);
        }

        $company->managers()->syncWithoutDetaching([
            $request->user()->id => [
                'role' => $invitation->role,
                'assigned_by' => $invitation->invited_by,
            ],
        ]);

        $invitation->forceFill([
            'accepted_at' => now(),
        ])->save();

        return redirect()
            ->route('dashboard')
            ->with('status', 'Invitation accepted. You can now manage the company.');
    }
}
