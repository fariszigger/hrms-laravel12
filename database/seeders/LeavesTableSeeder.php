<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Leave;
use App\Models\User;

class LeavesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee = User::where('username', 'employeeuser')->first();

        Leave::create([
            'user_id' => $employee->id,
            'start_date' => now()->addDays(2),
            'end_date' => now()->addDays(5),
            'type' => 'Sick Leave',
        ]);
    }
}
