<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Attendance;
use App\Models\User;

class AttendanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee = User::where('username', 'employeeuser')->first();

        Attendance::create([
            'user_id' => $employee->id,
            'date' => now()->subDay(),
            'status' => 'present',
        ]);
    }
}
