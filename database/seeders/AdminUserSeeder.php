<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Ensure the admin role exists
        $role = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $role2 = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);
        // Create an admin user if it does not exist
        $user = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
            ]
        );

        // Assign role
        $user->assignRole($role);
    }
}
