<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // Users
            'can-see-users',
            'can-create-users',
            'can-edit-users',
            'can-delete-users',
            'can-update-user-status',

            // Roles
            'can-see-roles',
            'can-create-roles',
            'can-edit-roles',
            'can-delete-roles',
            'can-show-roles',

            // Permissions
            'can-see-permissions',
            'can-create-permissions',
            'can-edit-permissions',
            'can-delete-permissions',

            // Media
            'can-see-media',
            'can-create-media',
            'can-edit-media',
            'can-delete-media',

            // Activity Logs
            'can-see-activity-logs',

            // Settings
            'can-see-settings',
        ];

        Permission::truncate();
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission, 'guard_name' => 'web']
            );
        }
    }
}
