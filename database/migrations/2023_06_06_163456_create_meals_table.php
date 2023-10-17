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
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('small_meal_price');
            $table->string('medium_meal_price');
            $table->string('large_meal_price');
            $table->string('image');
            // $table->string('category');
            $table->foreignId('category_id')->constrained('categories');

            // $table->foreignId('category_id')->refrences('id')->on('categories');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meals');
    }
};
