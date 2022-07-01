<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoardingBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoarding_bill_details', function (Blueprint $table) {
            $table->id();
            $table->integer('HoardingID')->nullable();
            $table->date('BillDate')->nullable();
            $table->integer('RenewalYear')->nullable();
            $table->decimal('LicenseFee', $precision = 18, $scale = 2);
            $table->decimal('Demand', $precision = 18, $scale = 2);
            $table->decimal('GSTPercent', $precision = 18, $scale = 2);
            $table->decimal('GST', $precision = 18, $scale = 2);
            $table->decimal('NetAmount', $precision = 18, $scale = 2);
            $table->integer('PaymentID')->nullable();
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
        Schema::dropIfExists('hoarding_bill_details');
    }
}
