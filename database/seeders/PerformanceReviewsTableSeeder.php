<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PerformanceReview;
use App\Models\User;

class PerformanceReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee = User::where('username', 'employeeuser')->first();

        PerformanceReview::create([
            'user_id' => $employee->id,
            'review_date' => now(),
            'score' => 85,
            'comments' => 'Great performance!',
        ]);
    }
}
