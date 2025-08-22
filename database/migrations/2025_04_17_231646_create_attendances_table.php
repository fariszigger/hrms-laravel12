<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();

            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->date('date'); // Date of attendance
            $table->time('check_in')->nullable(); // Actual check-in time
            $table->time('check_out')->nullable(); // Actual check-out time

            $table->boolean('is_late')->default(false); // Was the employee late?
            $table->integer('late_minutes')->default(0); // How late in minutes

            $table->string('status')->default('present'); // present, absent, sick, etc.

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
