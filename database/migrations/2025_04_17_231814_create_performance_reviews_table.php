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
        Schema::create('performance_reviews', function (Blueprint $table) {
            $table->id();

            $table->foreignId('employee_id')->constrained()->cascadeOnDelete(); // Related employee
            $table->foreignId('reviewer_id')->constrained('users')->cascadeOnDelete(); // Who conducted the review (e.g., manager)

            $table->date('review_date'); // The date the review took place
            $table->text('feedback')->nullable(); // Feedback provided during the review
            $table->integer('rating')->nullable(); // A numerical rating (1-5, 1-10, etc.)
            $table->text('actions_taken')->nullable(); // Any actions or plans for improvement

            $table->timestamps();
            $table->softDeletes(); // Soft delete for record tracking
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performance_reviews');
    }
};
