<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;
use App\Models\Department;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hrDepartment = Department::where('name', 'Human Resources')->first();
        $itDepartment = Department::where('name', 'IT Department')->first();

        Position::create([
            'title' => 'HR Manager',
            'description' => 'Oversees HR policies, manages recruitment, handles employee relations, and ensures legal compliance.',
            'department_id' => $hrDepartment->id,
        ]);

        Position::create([
            'title' => 'IT Support',
            'description' => 'Provides technical assistance, troubleshoots hardware/software issues, and supports IT infrastructure.',
            'department_id' => $itDepartment->id,
        ]);
    }
}
