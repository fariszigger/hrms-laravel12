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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->date('payroll_date'); // E.g. 2025-04-01 for March salary
        
            $table->decimal('gross_salary', 15, 2); // Basic + allowance + bonus
            $table->decimal('total_deduction', 15, 2); // Calculated from attendance, loans, etc.
            $table->decimal('net_salary', 15, 2); // Final amount = gross - deduction
        
            $table->timestamps();
            $table->softDeletes();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_payrolls');
    }
};
