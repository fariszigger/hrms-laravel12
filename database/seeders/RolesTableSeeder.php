<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'Administrator',
            'slug' => 'admin',
            'description' => 'User with full access to the system',
        ]);
        Role::create([
            'name' => 'Employee',
            'slug' => 'employee',
            'description' => 'User with limited access to the system',
        ]);
    }
}
