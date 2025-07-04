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
        Schema::create('products', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->autoIncrement()->primary();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('category_id')->constrained('product_categories');
            $table->string('name');
            $table->string('quantity');
            $table->foreignId('quantity_type_id')->constrained('quantity_types');
            $table->string('description');
            $table->string('price');
            $table->string('photo')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
