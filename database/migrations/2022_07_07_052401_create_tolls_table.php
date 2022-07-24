<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tolls', function (Blueprint $table) {
            $table->id();
            $table->string('TollCode')->nullable();
            $table->string('AreaName')->nullable();
            $table->string('ShopNo')->nullable();
            $table->string('ShopType')->nullable();
            $table->string('VendorName')->nullable();
            $table->string('Address')->nullable();
            $table->integer('Rate')->nullable();
            $table->dateTime('LastPaymentDate')->nullable();
            $table->integer('LastAmount')->nullable();
            $table->string('Location')->nullable();
            $table->string('PresentLength')->nullable();
            $table->string('PresentBreadth')->nullable();
            $table->string('PresentHeight')->nullable();
            $table->string('NoOfFloors')->nullable();
            $table->string('TradeLicense')->nullable();
            $table->string('Construction')->nullable();
            $table->string('Utility')->nullable();
            $table->string('Mobile')->nullable();
            $table->string('Remarks')->nullable();
            $table->string('Photograph1')->nullable();
            $table->string('Photograph2')->nullable();
            $table->string('Longitude')->nullable();
            $table->string('Latitude')->nullable();
            $table->integer('UserId')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations....
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tolls');
    }
}
