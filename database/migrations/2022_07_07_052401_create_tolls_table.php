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
            $table->mediumText('Allotee')->nullable();
            $table->mediumText('ShopNo')->nullable();
            $table->mediumText('ShopType')->nullable();
            $table->mediumText('AreaName')->nullable();
            $table->mediumText('VendorName')->nullable();
            $table->mediumText('Address')->nullable();
            $table->mediumText('Location')->nullable();
            $table->integer('Rate')->nullable();
            $table->dateTime('LastPaymentDate')->nullable();
            $table->integer('LastAmount')->nullable();
            $table->mediumText('NoOfFloors')->nullable();
            $table->mediumText('PresentOccupier')->nullable();
            $table->mediumText('TradeLicense')->nullable();
            $table->mediumText('Construction')->nullable();
            $table->mediumText('ConstructionType')->nullable();
            $table->mediumText('SalePurchase')->nullable();
            $table->string('ContactNo', 50)->nullable();
            $table->mediumText('Remarks')->nullable();
            $table->mediumText('PhotographLocation')->nullable();
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
