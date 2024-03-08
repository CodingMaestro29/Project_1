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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('lname')->nullable();
            $table->string('email')->nullable();
            $table->string('date')->nullable();
            $table->string('month')->nullable();
            $table->string('years')->nullable();
            $table->string('number11')->nullable();
            $table->string('number12')->nullable();
            $table->string('number13')->nullable();
            $table->string('licenseState')->nullable();
            $table->string('licensenumber')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('password_confirmation')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('states')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('find')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
