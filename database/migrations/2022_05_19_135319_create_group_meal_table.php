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
        Schema::create('meal_meal_group', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('order')->nullable();
            $table->bigInteger('meal_group_id')->unsigned()->nullable();
            $table->foreign('meal_group_id')->references('id')->on('meal_groups')->nullable()->onDelete('cascade');
            $table->bigInteger('meal_id')->unsigned()->nullable();
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
        Schema::dropIfExists('group_meal');

    }
};
