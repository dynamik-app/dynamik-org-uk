<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index(): View
    {
        $permissions = Permission::query()
            ->withCount(['roles', 'users'])
            ->orderBy('name')
            ->paginate(20);

        return view('admin.permissions.index', compact('permissions'));
    }

    public function create(): View
    {
        $roles = Role::orderBy('name')->get();

        return view('admin.permissions.create', compact('roles'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('permissions', 'name')->where(function ($query) {
                return $query->where('guard_name', 'web');
            })],
            'roles' => ['nullable', 'array'],
            'roles.*' => ['string', Rule::exists('roles', 'name')->where(function ($query) {
                return $query->where('guard_name', 'web');
            })],
        ]);

        $permission = Permission::create([
            'name' => $validated['name'],
            'guard_name' => 'web',
        ]);

        $permission->syncRoles($request->input('roles', []));

        return redirect()
            ->route('admin.permissions.show', $permission)
            ->with('status', 'Permission created successfully.');
    }

    public function show(Permission $permission): View
    {
        $permission->load(['roles' => function ($query) {
            $query->orderBy('name');
        }, 'users' => function ($query) {
            $query->orderBy('name');
        }]);

        return view('admin.permissions.show', compact('permission'));
    }

    public function edit(Permission $permission): View
    {
        $roles = Role::orderBy('name')->get();

        $permission->load('roles');

        return view('admin.permissions.edit', compact('permission', 'roles'));
    }

    public function update(Request $request, Permission $permission): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('permissions', 'name')->where(function ($query) use ($permission) {
                return $query->where('guard_name', 'web')->where('id', '!=', $permission->id);
            })],
            'roles' => ['nullable', 'array'],
            'roles.*' => ['string', Rule::exists('roles', 'name')->where(function ($query) {
                return $query->where('guard_name', 'web');
            })],
        ]);

        $permission->update([
            'name' => $validated['name'],
        ]);

        $permission->syncRoles($request->input('roles', []));

        return redirect()
            ->route('admin.permissions.show', $permission)
            ->with('status', 'Permission updated successfully.');
    }

    public function destroy(Permission $permission): RedirectResponse
    {
        if ($permission->roles()->exists() || $permission->users()->exists()) {
            return back()->with('status', 'Please detach this permission from all roles and users before deleting it.');
        }

        $permission->delete();

        return redirect()
            ->route('admin.permissions.index')
            ->with('status', 'Permission deleted successfully.');
    }
}
