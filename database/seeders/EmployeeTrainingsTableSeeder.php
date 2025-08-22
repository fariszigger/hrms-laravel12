<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EmployeeTraining;
use App\Models\User;
use App\Models\Training;

class EmployeeTrainingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee = User::where('username', 'employeeuser')->first();
        $training = Training::where('title', 'Leadership Training')->first();

        EmployeeTraining::create([
            'user_id' => $employee->id,
            'training_id' => $training->id,
            'start_date' => now(),
            'end_date' => now()->addDays(5),
        ]);
    }
}
