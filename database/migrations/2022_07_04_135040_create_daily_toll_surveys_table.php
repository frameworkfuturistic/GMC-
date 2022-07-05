<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyTollSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_toll_surveys', function (Blueprint $table) {
            $table->id();
            $table->mediumText('Circle')->nullable();
            $table->string('VendorName')->nullable();
            $table->string('Address')->nullable();
            $table->integer('MobileNo')->nullable();
            $table->mediumText('Location')->nullable();
            $table->mediumText('TollFee')->nullable();
            $table->mediumText('Photo')->nullable();
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
        Schema::dropIfExists('daily_toll_surveys');
    }
}
