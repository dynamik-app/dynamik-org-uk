<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Jetstream\DeleteUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()
            ->with(['roles'])
            ->orderBy('name')
            ->paginate(15);

        return view('admin.users.index', compact('users'));
    }

    public function show(User $user): View
    {
        $user->load(['roles', 'permissions']);

        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user): View
    {
        $roles = Role::orderBy('name')->get();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'roles' => ['nullable', 'array'],
            'roles.*' => ['string', Rule::exists('roles', 'name')],
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        $user->syncRoles($request->input('roles', []));

        return redirect()
            ->route('admin.users.show', $user)
            ->with('status', 'User updated successfully.');
    }

    public function destroy(Request $request, User $user, DeleteUser $deleteUser): RedirectResponse
    {
        if ($request->user()->is($user)) {
            return back()->with('status', 'You cannot delete your own administrator account.');
        }

        $deleteUser->delete($user);

        return redirect()
            ->route('admin.users.index')
            ->with('status', 'User deleted successfully.');
    }
}
