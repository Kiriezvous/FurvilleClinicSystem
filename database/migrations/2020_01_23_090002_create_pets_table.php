<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->string('name');
            $table->bigInteger('gender_id')->unsigned();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->bigInteger('bloodtype_id')->unsigned();
            $table->foreign('bloodtype_id')->references('id')->on('blood_types')->onDelete('cascade');
            $table->bigInteger('weight')->unsigned();
            $table->foreign('weight')->references('id')->on('measurements')->onDelete('cascade');
            $table->bigInteger('height')->unsigned();
            $table->foreign('height')->references('id')->on('measurements')->onDelete('cascade');
            $table->bigInteger('animal_type')->unsigned();
            $table->foreign('animal_type')->references('id')->on('animal_types')->onDelete('cascade');
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
        Schema::dropIfExists('pets');
    }
}
