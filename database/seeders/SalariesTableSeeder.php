<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Salary;
use App\Models\User;

class SalariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee = User::where('username', 'employeeuser')->first();

        Salary::create([
            'user_id' => $employee->id,
            'amount' => 5000,
            'effective_date' => now(),
        ]);
    }
}
