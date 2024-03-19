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
        Schema::create('student_completions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('students');
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('lname')->nullable();
            $table->string('DOB')->nullable();
            $table->string('email')->nullable();
            $table->string('license_number')->nullable();
            $table->string('complete_time')->nullable();
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_completions');
    }
};
