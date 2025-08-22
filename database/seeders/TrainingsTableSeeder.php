<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Training;

class TrainingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Training::create([
            'title' => 'Leadership Training',
            'duration' => 5,
        ]);
        Training::create([
            'title' => 'Technical Skills Training',
            'duration' => 3,
        ]);
    }
}
