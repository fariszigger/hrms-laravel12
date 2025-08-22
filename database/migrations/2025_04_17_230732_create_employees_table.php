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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            // Basic Information
            $table->string('name');
            $table->string('employee_id')->unique(); // Unique identifier for the employee
            $table->string('code')->unique(); // Code 
            $table->string('user_id')->unique(); // Connected to User management
            $table->string('email')->nullable(); // Optional email
            $table->string('phone')->nullable(); // Phone number
            $table->string('address')->nullable(); // Address of the employee
            $table->enum('gender', ['male', 'female'])->nullable(); // Gender of Employee
            $table->string('pob')->nullable(); // Place of Birth
            $table->date('dob')->nullable(); // Date of birth
            $table->enum('married', ['single', 'married', 'divorced', 'widowed']); // Marrietal Status

            // Emergency Contact Info
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->string('emergency_contact_relationship')->nullable();

            // Employment Info
            $table->foreignId('department_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('position_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('employee_type')->default('full-time')->index();
            $table->date('hire_date'); // Date employee join
            $table->decimal('salary', 10, 2)->nullable(); // Employee's salary
            $table->decimal('bonus', 10, 2)->nullable(); // Optional: Bonus field
            $table->string('status')->default('active')->index();
            $table->date('termination_date')->nullable(); // Date when the employee left (if applicable)

            // Work Experience and Qualifications
            $table->text('education')->nullable(); // Highest level of education achieved
            $table->text('previous_employment')->nullable(); // Previous work experience (optional)
            $table->text('skills')->nullable(); // Key skills for the employee

            // Performance
            $table->text('performance_reviews')->nullable(); // Store employee performance review notes

            // Miscellaneous
            $table->text('notes')->nullable(); // Any other important notes
            $table->string('mother_name');

            // KTP, KK, SIM Numbers
            $table->string('ktp_number')->nullable()->unique();
            $table->string('kk_number')->nullable();
            $table->string('sim_number')->nullable()->unique();
            $table->string('npwp_number')->nullable()->unique();
            $table->string('bpjskes_number')->nullable();
            $table->string('bpjsket_number')->nullable();

            // Photo
            $table->string('photo_path')->nullable(); // example: 'photos/employees/12345.jpg'

            // Soft delete and timestamps
            $table->softDeletes(); // Soft delete support
            $table->timestamps(); // Automatically adds created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
