<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{

    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pet_type')->unsigned();
            $table->foreign('pet_type')->references('id')->on('pet_types')->onDelete('cascade');
            $table->string('pet_name');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('gender');
            $table->bigInteger('blood_type')->unsigned();
            $table->foreign('blood_type')->references('id')->on('blood_types')->onDelete('cascade');
            $table->float('weight');
            $table->float('height');
            $table->string('image');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
