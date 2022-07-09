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
            $table->mediumText('VendorName')->nullable();
            $table->mediumText('VendorFather')->nullable();
            $table->mediumText('ShopName')->nullable();
            $table->mediumText('MarketName')->nullable();
            $table->mediumText('AreaName')->nullable();
            $table->dateTime('LastPaymentDate')->nullable();
            $table->integer('LastAmount')->nullable();
            $table->integer('Rate')->nullable();
            $table->integer('UserId')->nullable();
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
        Schema::dropIfExists('tolls');
    }
}
