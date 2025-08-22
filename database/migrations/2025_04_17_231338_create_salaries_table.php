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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();

            $table->foreignId('employee_id')->constrained()->cascadeOnDelete(); // Link to employees
            $table->foreignId('position_id')->nullable()->constrained()->nullOnDelete(); // Optional link to position

            $table->decimal('basic_salary', 15, 2); // Core salary
            $table->decimal('allowance', 15, 2)->default(0); // Extra allowance (e.g., meal, transport)
            $table->decimal('bonus', 15, 2)->default(0); // Performance or other bonus
            $table->decimal('deduction', 15, 2)->default(0); // Deductions (e.g., late penalty)

            $table->date('effective_from'); // When this salary record starts being valid
            $table->date('effective_until')->nullable(); // When it stops (if any)

            $table->timestamps();
            $table->softDeletes(); // Keep historical salary changes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
