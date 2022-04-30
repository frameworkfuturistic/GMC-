<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveySepticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_septics', function (Blueprint $table) {
            $table->id();
            $table->string('HouseOwner');
            $table->string('HoldingNo');
            $table->string('Mobile');
            $table->string('Address');
            $table->string('Locality');
            $table->string('Interviewee');
            $table->string('Relation');
            $table->string('Longitude');
            $table->string('Latitude');
            $table->integer('Length');
            $table->integer('Width');
            $table->integer('Capacity');
            $table->string('Image1');
            $table->string('Image2');
            $table->string('UserID');
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
        Schema::dropIfExists('survey_septics');
    }
}
