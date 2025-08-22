<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Document;
use App\Models\User;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee = User::where('username', 'employeeuser')->first();

        Document::create([
            'user_id' => $employee->id,
            'title' => 'Employee Contract',
            'file_path' => 'path/to/contract.pdf',
        ]);
    }
}
