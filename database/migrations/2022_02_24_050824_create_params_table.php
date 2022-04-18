<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('params', function (Blueprint $table) {
            $table->id();

            $table->integer('SelfAdCounter')->nullable();
            $table->mediumText('SelfAdPrefix')->nullable();

            $table->integer('VehicleCounter')->nullable();
            $table->mediumText('VehiclePrefix')->nullable();

            $table->integer('DharmasalaCounter')->nullable();
            $table->mediumText('DharmasalaPrefix')->nullable();

            $table->integer('LandCounter')->nullable();
            $table->mediumText('LandPrefix')->nullable();

            $table->integer('BanquetCounter')->nullable();
            $table->mediumText('BanquetPrefix')->nullable();

            $table->integer('LodgeCounter')->nullable();
            $table->mediumText('LodgePrefix')->nullable();

            $table->integer('AgencyCounter')->nullable();
            $table->mediumText('AgencyPrefix')->nullable();

            $table->integer('HoardingCounter')->nullable();
            $table->mediumText('HoardingPrefix')->nullable();
            $table->smallInteger('AllowRegistration')->nullable();
            $table->integer('VendorCounter')->nullable();
            $table->mediumText('VendorPrefix')->nullable();
            $table->mediumText('SurveyPrefix')->nullable();
            $table->integer('SurveyCounter')->nullable();
            $table->integer('LastBillYear')->nullable();
            $table->integer('ShopPenalty')->nullable();
            $table->integer('HoardingWorkflowID')->nullable();
            $table->integer('LodgeWorkflowID')->nullable();
            $table->integer('BanquetWorkflowID')->nullable();
            $table->integer('AgencyLicenseFee')->nullable();
            $table->decimal('VehicleAnnualRate', $precision=18, $scale=2)->nullable();
            $table->integer('VehicleLicenseFee')->nullable();
            $table->integer('GSTRate')->nullable();
            $table->mediumText('LodgeSignPath')->nullable();
            $table->mediumText('BanquetSignPath')->nullable();
            $table->mediumText('AgencySignPath')->nullable();
            $table->mediumText('ShopSignPath')->nullable();
            $table->mediumText('SelfSignPath')->nullable();
            $table->mediumText('VehicleSignPath')->nullable();
            $table->mediumText('PLSignPath')->nullable();
            $table->mediumText('HoardingSignPath')->nullable();
            $table->mediumText('DharamshalaSignPath')->nullable();
            $table->mediumText('CurrentFinancialYear')->nullable();
            $table->mediumText('AllowCreateUser')->nullable();
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
        Schema::dropIfExists('params');
    }
}
