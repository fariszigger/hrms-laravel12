<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'Administrator')->first();
        $employeeRole = Role::where('name', 'Employee')->first();

        // Check if roles exist and create if not
        if (!$adminRole) {
            $adminRole = Role::create(['name' => 'Admin']);
        }

        if (!$employeeRole) {
            $employeeRole = Role::create(['name' => 'Employee']);
        }

        User::create([
            'name' => 'Admin User',
            'username' => 'adminuser',
            'password' => bcrypt('password'),
            'role_id' => $adminRole->id,
        ]);

        User::create([
            'name' => 'Employee User',
            'username' => 'employeeuser',
            'password' => bcrypt('password'),
            'role_id' => $employeeRole->id,
        ]);
    }
}
