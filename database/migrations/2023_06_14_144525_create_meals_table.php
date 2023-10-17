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
            $table->double('small_meal_price');
            $table->double('medium_meal_price');
            $table->double('large_meal_price');
            // $table->string('category_id')->unique();
            // $table->foreign('category_id')->references('id')->on('categories ');
            // $table-> bigInteger('category_id')->unsigned();
            $table->string('image');
            $table->string('category');
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
