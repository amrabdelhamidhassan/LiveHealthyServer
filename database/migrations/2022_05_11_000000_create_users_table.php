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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname');
            $table->datetime('lastLogin')->nullable();
            $table->string('lname');
            $table->unsignedInteger('age');
            $table->string('phone')->unique();
            $table->unsignedInteger('height');
            $table->unsignedInteger('weight');
            $table->enum('gender', ['male', 'female']);
            $table->enum('weightGoal', ['gain', 'lose','maintain']);
            $table->unsignedInteger('fatpercentage')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->bigInteger('roleId')->unsigned()->nullable();
            $table->bigInteger('activityId')->unsigned()->nullable();
            $table->foreign('roleId')->references('id')->on('roles')->nullable()->onDelete('cascade');
            $table->foreign('activityId')->references('id')->on('activities')->nullable()->onDelete('cascade');
            $table->boolean('isblocked');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
