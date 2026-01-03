<?php

namespace Database\Seeders;

use App\Models\Conference;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Roles
        $clientRole = Role::firstOrCreate(['name' => 'client']);
        $employeeRole = Role::firstOrCreate(['name' => 'employee']);
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Users
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User', // jei tavo users lentelėje yra name
                'password' => Hash::make('admin123'),
            ]
        );

        $employee = User::firstOrCreate(
            ['email' => 'employee@example.com'],
            [
                'name' => 'Employee User',
                'password' => Hash::make('employee123'),
            ]
        );

        // Attach roles (pivot)
        $admin->roles()->syncWithoutDetaching([$adminRole->id]);
        $employee->roles()->syncWithoutDetaching([$employeeRole->id]);

        // Conferences
        Conference::factory()->count(8)->create();
    }
}