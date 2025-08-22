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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();

            $table->foreignId('employee_id')->constrained()->cascadeOnDelete(); // Relate to an employee
            $table->string('title'); // Document title
            $table->text('description')->nullable(); // Optional description of the document

            $table->string('file_path'); // Path to the uploaded document
            $table->string('file_type'); // Type of file (PDF, DOCX, etc.)
            $table->string('file_size'); // Size of the file (in KB/MB)

            $table->timestamps();
            $table->softDeletes(); // Keep historical record even after deletion
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
