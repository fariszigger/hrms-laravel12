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
        Schema::create('employee_training', function (Blueprint $table) {
            $table->id();

            $table->foreignId('employee_id')->constrained()->cascadeOnDelete(); // Link to employees table
            $table->foreignId('training_id')->constrained()->cascadeOnDelete(); // Link to trainings table

            $table->date('attended_at')->nullable(); // When the employee attended the training
            $table->string('status')->default('attended'); // e.g., 'attended', 'in progress', 'canceled'
            $table->text('notes')->nullable(); // Optional notes about performance or feedback

            $table->timestamps();
            $table->softDeletes(); // For record-keeping even if removed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_training');
    }
};
