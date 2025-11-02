<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(): View
    {
        $roles = Role::query()
            ->withCount(['users', 'permissions'])
            ->orderBy('name')
            ->paginate(15);

        return view('admin.roles.index', compact('roles'));
    }

    public function create(): View
    {
        $permissions = Permission::orderBy('name')->get();

        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('roles', 'name')->where(function ($query) {
                return $query->where('guard_name', 'web');
            })],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['string', Rule::exists('permissions', 'name')->where(function ($query) {
                return $query->where('guard_name', 'web');
            })],
        ]);

        $role = Role::create([
            'name' => $validated['name'],
            'guard_name' => 'web',
        ]);

        $role->syncPermissions($request->input('permissions', []));

        return redirect()
            ->route('admin.roles.show', $role)
            ->with('status', 'Role created successfully.');
    }

    public function show(Role $role): View
    {
        $role->load(['permissions', 'users' => function ($query) {
            $query->orderBy('name');
        }]);

        return view('admin.roles.show', compact('role'));
    }

    public function edit(Role $role): View
    {
        $permissions = Permission::orderBy('name')->get();

        $role->load('permissions');

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role): RedirectResponse
    {
        if ($role->name === 'admin' && $request->input('name') !== 'admin') {
            return back()->withInput()->withErrors(['name' => 'The admin role name cannot be changed.']);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('roles', 'name')->where(function ($query) use ($role) {
                return $query->where('guard_name', 'web')->where('id', '!=', $role->id);
            })],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['string', Rule::exists('permissions', 'name')->where(function ($query) {
                return $query->where('guard_name', 'web');
            })],
        ]);

        $role->update([
            'name' => $validated['name'],
        ]);

        $role->syncPermissions($request->input('permissions', []));

        return redirect()
            ->route('admin.roles.show', $role)
            ->with('status', 'Role updated successfully.');
    }

    public function destroy(Role $role): RedirectResponse
    {
        if ($role->name === 'admin') {
            return back()->with('status', 'The admin role cannot be deleted.');
        }

        if ($role->users()->exists()) {
            return back()->with('status', 'Please remove users from this role before deleting it.');
        }

        $role->delete();

        return redirect()
            ->route('admin.roles.index')
            ->with('status', 'Role deleted successfully.');
    }
}
