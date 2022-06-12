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
        Schema::create('food_meal', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->float('serving',8,3)->default(1);
            $table->bigInteger('food_id')->unsigned()->nullable();
            $table->bigInteger('meal_id')->unsigned()->nullable();
            $table->unique(['food_id','meal_id']);
            $table->foreign('food_id')->references('id')->on('food')->nullable()->onDelete('cascade');
            $table->foreign('meal_id')->references('id')->on('meals')->nullable()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('food_meal', function (Blueprint $table) {
            //
            Schema::dropIfExists('food_meal');

        });
    }
};
