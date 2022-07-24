<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('ShopCode', 50)->nullable();
            $table->string('Circle', 50)->nullable();
            $table->string('Market', 50)->nullable();
            $table->string('SerialNo', 50)->nullable();
            $table->string('Allottee', 50)->nullable();
            $table->string('ShopNo', 50)->nullable();
            $table->integer('Rate', 50)->nullable();
            $table->dateTime('LastPaymentDate', 50)->nullable();
            $table->integer('LastAmount', 50)->nullable();
            $table->decimal('AllottedLength', $presicion = 18, $scale = 2)->nullable();
            $table->decimal('AllottedBreadth', $presicion = 18, $scale = 2)->nullable();
            $table->decimal('AllottedHeight', $presicion = 18, $scale = 2)->nullable();
            $table->decimal('PresentLength', $presicion = 18, $scale = 2)->nullable();
            $table->decimal('PresentBreadth', $presicion = 18, $scale = 2)->nullable();
            $table->decimal('PresentHeight', $presicion = 18, $scale = 2)->nullable();
            $table->string('NoOfFloors', 50)->nullable();
            $table->string('PresentOccupier', 100)->nullable();
            $table->string('TradeLicense', 50)->nullable();
            $table->string('Construction', 50)->nullable();
            $table->string('Electricity', 50)->nullable();
            $table->string('Water', 50)->nullable();
            $table->string('SalePurchase', 50)->nullable();
            $table->string('ContactNo', 50)->nullable();
            $table->string('Longitude', 50)->nullable();
            $table->string('Latitude', 50)->nullable();
            $table->string('Photo1Path', 500)->nullable();
            $table->string('Photo2Path', 500)->nullable();
            $table->string('Photo3Path', 500)->nullable();
            $table->string('Remarks', 50)->nullable();
            $table->integer('UserId')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations s....
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
