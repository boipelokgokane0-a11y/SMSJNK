<?php

/**
 * Seeder to create default administrators for J & K Designs Academy.
 *
 * Run with: php artisan db:seed --class=AdminUserSeeder
 */

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure the admin role exists
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);

        $admins = [
            [
                'email' => 'admin@jkdesignsacademy.co.za',
                'name' => 'J & K Designs Administrator',
                'role' => 'admin',
                'password' => Hash::make('password'),
                'contact_number' => '0800123456',
                'address' => '45 Brooklyn Street, Pretoria',
                'first_name' => 'System',
                'surname' => 'Admin',
                'account_status' => 'Active',
                'email_verified_at' => now(),
            ],
            [
                'email' => 'admin@jnkdesignsacademy.co.za',
                'name' => 'Jand K Design Academy Admin',
                'role' => 'admin',
                'password' => Hash::make('password'),
                'contact_number' => '0800123456',
                'address' => '45 Brooklyn Street, Pretoria',
                'first_name' => 'Jand',
                'surname' => 'Admin',
                'account_status' => 'Active',
                'email_verified_at' => now(),
            ],
            [
                'email' => 'admin@admin.com',
                'name' => 'System Administrator',
                'role' => 'admin',
                'password' => Hash::make('password'),
                'contact_number' => '0123456789',
                'address' => 'Administrative Office',
                'first_name' => 'System',
                'surname' => 'Administrator',
                'account_status' => 'Active',
                'email_verified_at' => now(),
            ],
        ];

        foreach ($admins as $data) {
            $admin = User::updateOrCreate(['email' => $data['email']], $data);
            if (! $admin->hasRole('admin')) {
                $admin->assignRole($adminRole);
            }
        }
    }
}
