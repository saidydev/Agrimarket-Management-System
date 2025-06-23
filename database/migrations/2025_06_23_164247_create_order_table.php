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
     Schema::create('orders', function (Blueprint $table) {
    $table->unsignedBigInteger('order_id')->autoIncrement()->primary();

    $table->unsignedBigInteger('farmer_id');
    $table->unsignedBigInteger('supplier_id');
    $table->unsignedBigInteger('input_id');

    $table->string('quantity');
    $table->string('price');
    $table->string('status');
    $table->timestamps();

    // Correct foreign keys
    $table->foreign('farmer_id')->references('user_id')->on('users')->onDelete('cascade');
    $table->foreign('supplier_id')->references('user_id')->on('users')->onDelete('cascade');
    $table->foreign('input_id')->references('input_id')->on('inputs')->onDelete('cascade');
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
