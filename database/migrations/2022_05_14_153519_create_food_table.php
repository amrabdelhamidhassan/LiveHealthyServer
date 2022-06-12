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
        Schema::create('food', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('arabicname')->nullable();
            $table->string('nickname')->nullable();
            $table->string('arabicnickname')->nullable();
            $table->string('photourl')->nullable();
            $table->bigInteger('foodTypeId')->unsigned()->nullable();
            $table->bigInteger('preferableTimeId')->unsigned()->nullable();
            $table->bigInteger('userId')->unsigned()->nullable();
            $table->foreign('userId')->references('id')->on('users')->nullable()->onDelete('cascade');
            $table->foreign('foodTypeId')->references('id')->on('food_types')->nullable()->onDelete('cascade');
            $table->foreign('preferableTimeId')->references('id')->on('preferable_times')->nullable()->onDelete('cascade');
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
        Schema::dropIfExists('food');
    }
};
