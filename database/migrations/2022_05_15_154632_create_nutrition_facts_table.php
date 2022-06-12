<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutrition_facts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('calories');
            $table->bigInteger('servingSize');
            $table->float('totalfats',8,3);
            $table->float('saturatedfats',8,3)->nullable();
            $table->float('polyunsaturatedfats',8,3)->nullable();
            $table->float('monounsaturatedfats',8,3)->nullable();
            $table->float('transfats',8,3)->nullable();
            $table->float('totalcarbs',8,3);
            $table->float('sugars',8,3)->nullable();
            $table->float('fibers',8,3)->nullable();
            $table->float('starches',8,3)->nullable();
            $table->float('protein',8,3);
            $table->float('vitaminA',8,3)->nullable();
            $table->float('vitaminC',8,3)->nullable();
            $table->float('vitaminD',8,3)->nullable();
            $table->float('vitaminK',8,3)->nullable();
            $table->float('vitaminE',8,3)->nullable();
            $table->float('vitaminB1',8,3)->nullable();
            $table->float('vitaminB2',8,3)->nullable();
            $table->float('vitaminB3',8,3)->nullable();
            $table->float('vitaminB5',8,3)->nullable();
            $table->float('vitaminB6',8,3)->nullable();
            $table->float('vitaminB7',8,3)->nullable();
            $table->float('vitaminB9',8,3)->nullable();
            $table->float('vitaminB12',8,3)->nullable();
            $table->float('choline',8,3)->nullable();
            $table->float('calcium',8,3)->nullable();
            $table->float('chloride',8,3)->nullable();
            $table->float('chromium',8,3)->nullable();
            $table->float('copper',8,3)->nullable();
            $table->float('fluoride',8,3)->nullable();
            $table->float('iodine',8,3)->nullable();
            $table->float('iron',8,3)->nullable();
            $table->float('magnesium',8,3)->nullable();
            $table->float('manganese',8,3)->nullable();
            $table->float('molybdenum',8,3)->nullable();
            $table->float('phosphorus',8,3)->nullable();
            $table->float('potassium',8,3)->nullable();
            $table->float('selenium',8,3)->nullable();
            $table->float('sodium',8,3)->nullable();
            $table->float('zinc',8,3)->nullable();
            $table->bigInteger('foodId')->unsigned()->nullable();
            $table->bigInteger('servingQuantityId')->unsigned()->nullable();
            $table->foreign('foodId')->references('id')->on('food')->nullable()->onDelete('cascade');
            $table->foreign('servingQuantityId')->references('id')->on('serving_quantities')->nullable()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nutrition_facts');
    }
};
