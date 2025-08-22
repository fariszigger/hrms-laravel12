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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g., Backend Developer, HR Manager
            $table->text('description')->nullable(); // Optional: Description of the job/position
            $table->foreignId('department_id')->constrained()->cascadeOnDelete(); // Link to departments table
            $table->decimal('base_salary', 10, 2)->nullable(); // Optional: base salary for the position
            $table->timestamps();
            $table->softDeletes(); // So deleted positions are still traceable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
