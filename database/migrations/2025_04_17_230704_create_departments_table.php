<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Example: Human Resources, IT, Finance, etc.
            $table->text('description')->nullable(); // Optional: Describe the department
            $table->string('code')->nullable()->unique(); // Optional: Department code (e.g., HR, IT)
            $table->timestamps();
            $table->softDeletes(); // To track deleted departments without removing data
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
