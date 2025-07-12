<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission; // غيّرها لو المسار مختلف
use App\Models\Role;       // غيّرها لو المسار مختلف

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
     $permissions = [
            // Admins
            'admins-read', 'admins-create', 'admins-update', 'admins-delete', 'profile-update',

            // Ingredients
            'ingredients-read', 'ingredients-create', 'ingredients-update', 'ingredients-delete',

            // Invoices
            'invoices-read', 'invoices-create', 'invoices-update', 'invoices-delete',

            // Products
            'products-read', 'products-create', 'products-update', 'products-delete',

            // Product Ingredients
            'products-ingredients-read', 'products-ingredients-create', 'products-ingredients-update', 'products-ingredients-delete',

            // Roles
            'roles-read', 'roles-create', 'roles-update', 'roles-delete',

            // Sections
            'sections-read', 'sections-create', 'sections-update', 'sections-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // اربطهم مع السوبر أدمن فقط
        $superAdminRole = Role::where('name', 'superadmin')->first();

        if ($superAdminRole) {
            $superAdminRole->syncPermissions($permissions);
            $this->command->info('✅ All new permissions synced to super-admin role.');
        } else {
            $this->command->warn('⚠️ super-admin role not found. Please check role name.');
        }
    }
}
