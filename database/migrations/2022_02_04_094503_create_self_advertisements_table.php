<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelfAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('self_advertisements', function (Blueprint $table) {
            $table->id();
            // extra fields
            $table->string('RenewalID')->nullable();
            $table->string('UniqueID')->nullable();
            // $table->string('RenewalID')->nullable();
            $table->string('OldRenewalID')->nullable();
            $table->smallInteger('Renewal')->nullable();
            // extra fields
            $table->string('LicenseYear')->nullable();
            $table->string('OldRegistrationNo')->nullable();
            $table->string('Applicant')->nullable();
            $table->string('Father')->nullable();
            $table->string('Email')->nullable();
            $table->string('ResidenceAddress')->nullable();
            $table->string('WardNo')->nullable();
            $table->string('PermanentAddress')->nullable();
            $table->string('WardNo1')->nullable();
            $table->integer('MobileNo')->nullable();
            $table->string('AadharNo')->nullable();
            $table->string('EntityName')->nullable();
            $table->string('EntityAddress')->nullable();
            $table->string('InstallLocation')->nullable();
            $table->string('BrandDisplay')->nullable();
            $table->string('HoldingNo')->nullable();
            $table->string('TradeLicense')->nullable();
            $table->string('GSTNo')->nullable();
            $table->string('DisplayType')->nullable();
            $table->string('DisplayArea')->nullable();
            $table->string('Longitude')->nullable();
            $table->string('Latitude')->nullable();
            $table->string('AadharPath')->nullable();
            $table->string('TradeLicensePath')->nullable();
            $table->string('HoldingNoPath')->nullable();
            $table->string('GPSPhotoPath')->nullable();
            $table->string('GSTPath')->nullable();
            $table->string('Proceeding1Photo')->nullable();
            $table->string('Proceeding2Photo')->nullable();
            $table->string('Proceeding3Photo')->nullable();
            $table->string('extraDoc1')->nullable();
            $table->string('extraDoc2')->nullable();

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
        Schema::dropIfExists('self_advertisements');
    }
}
