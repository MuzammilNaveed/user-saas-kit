<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::truncate();
        $roles = ["Admin", "User"];
        foreach ($roles as $role) {
            $createdRole = Role::firstOrCreate(['name' => $role, 'guard_name' => 'web', 'user_id' => 1]);
            $permissions = \Spatie\Permission\Models\Permission::all();
            $createdRole->syncPermissions($permissions);
        }
    }
}
