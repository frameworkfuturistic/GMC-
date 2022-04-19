<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_shops', function (Blueprint $table) {
            $table->id();
            $table->string('Circle')->nullable();
            $table->string('Interviewee')->nullable();
            $table->string('Relation')->nullable();
            $table->string('LicenseeName')->nullable();
            $table->string('LicenseeFather')->nullable();
            $table->string('Address')->nullable();
            $table->string('Locality')->nullable();
            $table->string('AllotmentNo')->nullable();
            $table->string('AllotmentDate')->nullable();
            $table->string('ShopName')->nullable();
            $table->string('ShopNo')->nullable();
            $table->string('PlotNo')->nullable();
            $table->string('HoldingNo')->nullable();
            $table->string('BuildingType')->nullable();
            $table->string('Floor')->nullable();
            $table->string('AreaName')->nullable();
            $table->string('Latitude')->nullable();
            $table->string('Longitude')->nullable();
            $table->string('Image1')->nullable();
            $table->string('Image2')->nullable();
            $table->string('Email')->nullable();
            $table->string('GST')->nullable();
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
        Schema::dropIfExists('survey_shops');
    }
}
