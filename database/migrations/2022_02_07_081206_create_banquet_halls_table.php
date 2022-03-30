<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanquetHallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banquet_halls', function (Blueprint $table) {
            $table->id();

            // extra fields
            $table->string('RenewalID')->nullable();
            $table->string('UniqueID')->nullable();
            $table->string('OldRenewalID')->nullable();
            $table->smallInteger('Renewal')->nullable();
            // extra fields

            $table->string('licenseYear')->nullable();
            $table->string('Father')->nullable();
            $table->string('Email')->nullable();
            $table->string('ResidenceAddress')->nullable();
            $table->string('WardNo')->nullable();
            $table->string('PermanentAddress')->nullable();
            $table->string('WardNo1')->nullable();
            $table->string('HallType')->nullable();
            $table->string('EntityName')->nullable();
            $table->string('EntityAddress')->nullable();
            $table->string('EntityWard')->nullable();
            $table->string('HoldingNo')->nullable();
            $table->string('TradeLicenseNo')->nullable();
            $table->mediumText('Longitude')->nullable();
            $table->mediumText('Latitude')->nullable();
            $table->mediumText('OrganizationType')->nullable();
            $table->integer('FloorArea')->nullable();
            $table->mediumText('LandDeedType')->nullable();
            $table->mediumText('WaterSupplyType')->nullable();
            $table->mediumText('ElectricityType')->nullable();
            $table->mediumText('SecurityType')->nullable();
            $table->integer('CCTVNo')->nullable();
            $table->integer('FireExtinguishersNo')->nullable();
            $table->integer('EntryGatesNo')->nullable();
            $table->integer('ExitGatesNo')->nullable();
            $table->integer('TwoWheelersParkingSpace')->nullable();
            $table->integer('FourWheelersParkingSpace')->nullable();
            $table->mediumText('AadharCardNo')->nullable();
            $table->mediumText('PANCardNo')->nullable();
            $table->mediumText('BanquetHallPath')->nullable();
            $table->mediumText('AadharPath')->nullable();
            $table->mediumText('FireExtinguishersPath')->nullable();
            $table->mediumText('CompostingMachinePath')->nullable();
            $table->mediumText('BuildingPlanPath')->nullable();
            $table->mediumText('CCTVCameraPath')->nullable();
            $table->mediumText('NamePlatePath')->nullable();
            $table->mediumText('ParkingPath')->nullable();
            $table->mediumText('EntryExitPath')->nullable();
            $table->mediumText('IOReportCompostingPath')->nullable();
            $table->mediumText('HoldingTaxPath')->nullable();
            $table->mediumText('WaterUsageChargePath')->nullable();

            // extra fields
            $table->integer('WorkflowID')->nullable();
            $table->mediumText('CurrentUser')->nullable();
            $table->mediumText('Initiator')->nullable();
            $table->mediumText('Approver')->nullable();
            $table->integer('InspectorID')->nullable();
            $table->mediumText('InspectionRemarks')->nullable();
            $table->smallInteger('Pending')->nullable();
            $table->smallInteger('Approved')->nullable();
            $table->smallInteger('Rejected')->nullable();
            $table->string('ApprovalDate')->nullable();
            $table->smallInteger('Paid')->nullable();
            $table->mediumText('RejectionReason')->nullable();
            $table->mediumText('ApplicationStatus')->nullable();
            $table->decimal('LicenseFee', $precision = 18, $scale = 2)->nullable();
            $table->decimal('Amount', $precision = 18, $scale = 2)->nullable();
            $table->decimal('GST', $precision = 18, $scale = 2)->nullable();
            $table->decimal('NetAmount', $precision = 18, $scale = 2)->nullable();
            $table->integer('OnlinePaymentID')->nullable();
            $table->mediumText('PmtMode')->nullable();
            $table->mediumText('Bank')->nullable();
            $table->mediumText('MRNo')->nullable();
            $table->mediumText('DraftNo')->nullable();
            $table->dateTime('DraftDate')->nullable();
            $table->dateTime('PaymentDate')->nullable();
            $table->mediumText('ModifiedBy')->nullable();
            $table->mediumText('SignatureDate')->nullable();
            // extra fields
            
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
        Schema::dropIfExists('banquet_halls');
    }
}
