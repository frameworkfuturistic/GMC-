<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDharmasalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dharmasalas', function (Blueprint $table) {
            $table->id();
            
            // extra fields
            $table->string('RenewalID')->nullable();
            $table->string('UniqueID')->nullable();
            $table->string('OldRenewalID')->nullable();
            $table->smallInteger('Renewal')->nullable();
            // extra fields

            $table->string('Applicant')->nullable();
            $table->string('Father')->nullable();
            $table->string('mobile')->nullable();
            $table->string('Email')->nullable();
            $table->string('ResidenceAddress')->nullable();
            $table->string('WardNo')->nullable();
            $table->string('PermanentAddress')->nullable();
            $table->string('WardNo1')->nullable();
            $table->string('LicenseYear')->nullable();
            $table->string('EstablishedType')->nullable();
            $table->string('EntityName')->nullable();
            $table->string('EntityAddress')->nullable();
            $table->string('HoldingNo')->nullable();
            $table->string('LicenseNo')->nullable();
            $table->string('Longitude')->nullable();
            $table->string('Latitude')->nullable();
            $table->string('OrganizationType')->nullable();
            $table->string('LandDeedType')->nullable();
            $table->string('WaterSupplyType')->nullable();
            $table->string('ElectricityType')->nullable();
            $table->string('SecurityType')->nullable();
            $table->string('LodgeType')->nullable();
            $table->string('CCTVCameraNo')->nullable();
            $table->string('NoOfBeds')->nullable();
            $table->integer('NoOfRooms')->nullable();
            $table->integer('NoOfFireExtinguishers')->nullable();
            $table->integer('NoOfExitGate')->nullable();
            $table->integer('NoOfTwoWheelersParking')->nullable();
            $table->integer('NoOfFourWheelersParking')->nullable();
            $table->string('AadharNo')->nullable();
            $table->string('PANNo')->nullable();
            $table->string('HostelFrontagePath')->nullable();
            $table->string('AadharNoPath')->nullable();
            $table->string('FireExtinguishersPath')->nullable();
            $table->string('CCTVCameraPath')->nullable();
            $table->string('NamePlatePath')->nullable();
            $table->string('EntryExitPath')->nullable();
            $table->string('BuildingPlanPath')->nullable();
            $table->string('SolidWastePath')->nullable();
            $table->string('HoldingTaxReceiptPath')->nullable();
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
        Schema::dropIfExists('dharmasalas');
    }
}
