<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'manage solutions']);

        // Create roles and assign created permissions
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('manage solutions');

        $role = Role::create(['name' => 'user']);
    }
}
