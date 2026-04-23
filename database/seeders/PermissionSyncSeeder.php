<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionSyncSeeder extends Seeder
{
    public function run(): void
    {
        $modules = [
            'admins',
            'users',
            'roles',
            'permissions',
            'sections',
            'products',
            'invoices',
            'ingredients',
            'products-ingredients',
            'stocks',
            'stock-movements',
            'categories',
            'customers',
            'expenses',
            'reports',
            'settings',
        ];

        $crudActions = ['create', 'read', 'update', 'delete'];
        $permissions = [];

        foreach ($modules as $module) {
            foreach ($crudActions as $action) {
                $name = "{$module}-{$action}";
                Permission::firstOrCreate(['name' => $name], [
                    'display_name' => ucfirst($action).' '.ucfirst($module),
                    'description' => ucfirst($action).' '.ucfirst($module),
                ]);
                $permissions[] = $name;
            }
        }

        foreach (['profile-read', 'profile-update'] as $name) {
            Permission::firstOrCreate(['name' => $name], [
                'display_name' => ucwords(str_replace('-', ' ', $name)),
                'description' => ucwords(str_replace('-', ' ', $name)),
            ]);
            $permissions[] = $name;
        }

        $superadmin = Role::where('name', 'superadmin')->first();
        if ($superadmin) {
            $superadmin->syncPermissions($permissions);
        }
    }
}
