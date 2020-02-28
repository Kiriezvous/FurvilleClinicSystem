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
            $table->bigInteger('image')->unsigned();
            $table->foreign('image')->references('id')->on('patients')->onDelete('cascade');
            $table->bigInteger('pet_name')->unsigned();
            $table->foreign('pet_name')->references('id')->on('patients')->onDelete('cascade');
            $table->bigInteger('doctor_attended')->unsigned();
            $table->foreign('doctor_attended')->references('id')->on('doctors')->onDelete('cascade');
            $table->bigInteger('diagnosis_id')->unsigned();
            $table->foreign('diagnosis_id')->references('id')->on('diagnoses')->onDelete('cascade');
            $table->bigInteger('diagnosis')->unsigned();
            $table->foreign('diagnosis')->references('id')->on('diagnoses')->onDelete('cascade');
            $table->bigInteger('labresults')->unsigned();
            $table->foreign('labresults')->references('id')->on('diagnoses')->onDelete('cascade');
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
