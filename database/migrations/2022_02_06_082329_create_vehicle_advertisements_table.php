<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('applicant')->nullable();
            $table->string('father')->nullable();
            $table->string('email')->nullable();
            $table->string('ResidenceAddress')->nullable();
            $table->string('WardNo')->nullable();
            $table->string('PermanentAddress')->nullable();
            $table->string('WardNo1')->nullable();
            $table->string('MobileNo')->nullable();
            $table->string('AadharNo')->nullable();
            $table->string('LicenseFrom')->nullable();
            $table->string('LicenseTo')->nullable();
            $table->string('EntityName')->nullable();
            $table->string('TradeLicenseNo')->nullable();
            $table->string('GSTNo')->nullable();
            $table->string('VehicleNo')->nullable();
            $table->string('VehicleName')->nullable();
            $table->string('VehicleType')->nullable();
            $table->string('BrandDisplay')->nullable();
            $table->integer('FrontArea')->nullable();
            $table->integer('RearArea')->nullable();
            $table->integer('Side1Area')->nullable();
            $table->integer('TopArea')->nullable();
            $table->string('DisplayType')->nullable();
            $table->string('AadharPath')->nullable();
            $table->string('TradeLicensePath')->nullable();
            $table->string('VehiclePhotoPath')->nullable();
            $table->string('OwnerBookPath')->nullable();
            $table->string('DrivingLicensePath')->nullable();
            $table->string('InsurancePhotoPath')->nullable();
            $table->string('GSTNoPhotoPath')->nullable();
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
        Schema::dropIfExists('vehicle_advertisements');
    }
}
