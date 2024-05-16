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
        Schema::create('customerregistrations', function (Blueprint $table) {
            $table->id();
            $table->string('name',40);
            $table->string('email',100)->unique();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('address');
            $table->string('dob');
            $table->string('image')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customerregistrations');
    }
};