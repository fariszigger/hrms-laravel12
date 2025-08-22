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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();

            $table->foreignId('employee_id')->constrained()->cascadeOnDelete(); // Who's taking the leave

            $table->string('type'); // e.g., vacation, sick, unpaid, maternity
            $table->text('reason')->nullable(); // Optional description
            $table->date('start_date');
            $table->date('end_date');

            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Approval status

            $table->timestamps();
            $table->softDeletes(); // Keep record even after deletion
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
