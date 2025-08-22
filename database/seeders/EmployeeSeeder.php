<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Position;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $departments = Department::pluck('id')->toArray();
        $positions = Position::pluck('id')->toArray();

        Employee::factory(20)->create([
            'department_id' => fake()->randomElement($departments),
            'position_id' => fake()->randomElement($positions),
        ]);
    }
}
