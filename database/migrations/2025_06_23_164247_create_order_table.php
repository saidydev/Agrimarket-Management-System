<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id')->autoIncrement()->primary();
            $table->foreignId('farmer_id')->constrained('users');
            $table->foreignId('supplier_id')->constrained('users');
            $table->foreignId('input_id')->constrained('inputs', 'input_id');
            $table->string('quantity');
            $table->string('price');
            $table->string('status');
            $table->timestamps();
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
