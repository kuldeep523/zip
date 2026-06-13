<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $modules = [
            'products' => ['view', 'create', 'edit', 'delete'],
            'categories' => ['view', 'create', 'edit', 'delete'],
            'brands' => ['view', 'create', 'edit', 'delete'],
            'orders' => ['view', 'edit', 'delete'],
            'customers' => ['view', 'edit'],
            'inventory' => ['view', 'manage'],
            'coupons' => ['view', 'create', 'edit', 'delete'],
            'shipping' => ['view', 'manage'],
            'reviews' => ['view', 'approve', 'delete'],
            'blogs' => ['view', 'create', 'edit', 'delete'],
            'banners' => ['view', 'create', 'edit', 'delete'],
            'cms' => ['view', 'edit'],
            'seo' => ['manage'],
            'marketing' => ['manage'],
        ];

        foreach ($modules as $module => $actions) {
            foreach ($actions as $action) {
                Permission::firstOrCreate(['name' => "{$module}.{$action}", 'guard_name' => 'web']);
            }
        }

        $roles = [
            'Super Admin' => Permission::all()->pluck('name')->toArray(),
            'Admin' => Permission::where('name', 'not like', '%.delete')->pluck('name')->toArray(),
            'Manager' => Permission::whereIn('name', [
                'products.view', 'products.edit', 'categories.view', 'orders.view', 'orders.edit',
                'customers.view', 'inventory.view', 'inventory.manage', 'reviews.view', 'reviews.approve',
            ])->pluck('name')->toArray(),
            'Staff' => Permission::whereIn('name', [
                'products.view', 'orders.view', 'customers.view', 'reviews.view',
            ])->pluck('name')->toArray(),
            'Customer' => [],
        ];

        foreach ($roles as $roleName => $permissions) {
            $role = Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
            $role->syncPermissions($permissions);
        }
    }
}
