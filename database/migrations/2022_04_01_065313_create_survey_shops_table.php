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
            $table->string('AreaName');
            $table->string('Landmark');
            $table->string('Address');
            $table->string('Owner');
            $table->string('Latitude');
            $table->string('Longitude');
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
        Schema::dropIfExists('survey_shops');
    }
}
