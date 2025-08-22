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
        Schema::create('employee_relatives', function (Blueprint $table) {
        $table->id();
        $table->foreignId('employee_id')->constrained('employees')->cascadeOnDelete()->index();
        $table->enum('relative_status', ['spouse', 'child', 'sibling', 'parent', 'other']);
        $table->string('name');
        $table->string('email')->nullable();
        $table->string('phone')->nullable();
        $table->string('address')->nullable();
        $table->enum('gender', ['male', 'female'])->nullable();
        $table->string('pob')->nullable();
        $table->date('dob')->nullable();
        $table->enum('married', ['single', 'married', 'divorced', 'widowed']);

        $table->string('ktp_number')->nullable()->unique();
        $table->string('kk_number')->nullable();
        $table->string('sim_number')->nullable()->unique();
        $table->string('npwp_number')->nullable()->unique();
        $table->string('bpjskes_number')->nullable();
        $table->string('bpjsket_number')->nullable();

        $table->timestamps();
        $table->softDeletes(); // optional
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_relatives');
    }
};
