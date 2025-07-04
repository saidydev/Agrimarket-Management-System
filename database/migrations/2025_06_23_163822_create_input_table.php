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
        Schema::create('inputs', function (Blueprint $table) {
          $table->unsignedBigInteger('input_id')->autoIncrement()->primary();
          $table->foreignId('user_id')->constrained('users');
          $table->string('name');
          $table->string('price');
          $table->string('quantity');
          $table->string('photo')->nullable();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input');
    }
};
