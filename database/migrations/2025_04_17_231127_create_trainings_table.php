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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();

            // Training Details
            $table->string('title'); // e.g., "Leadership Skills", "Advanced Excel"
            $table->text('description')->nullable(); // Optional description
            $table->date('start_date'); // Training start
            $table->date('end_date'); // Training end

            // Location & Trainer Info
            $table->string('location')->nullable(); // Virtual or physical
            $table->string('trainer_name')->nullable(); // Can be internal or external trainer
            $table->string('trainer_email')->nullable(); // Optional
            $table->string('trainer_phone')->nullable(); // Optional

            // Optional: Type of training
            $table->enum('type', ['internal', 'external'])->default('internal');

            // Optional: Link to training document or resource
            $table->string('resource_link')->nullable(); // Can be a PDF URL or video link

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
