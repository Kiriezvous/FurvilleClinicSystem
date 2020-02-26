<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image'); //Pet Image
            $table->bigInteger('image')->unsigned();
            $table->foreign('image')->references('id')->on('patients')->onDelete('cascade');
            $table->string('pet_name');
            $table->string('doctor_attended');
            $table->string('diagnosis_id');
            $table->string('diagnosis'); //For Loop
            $table->string('labresults'); //For Loop for every Pet Name id
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
        Schema::dropIfExists('records');
    }
}
