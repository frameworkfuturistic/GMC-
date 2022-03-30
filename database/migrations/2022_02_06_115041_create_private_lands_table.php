<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivateLandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('private_lands', function (Blueprint $table) {
            $table->id();

             // extra fields
             $table->string('RenewalID')->nullable();
             $table->string('UniqueID')->nullable();
             $table->string('OldRenewalID')->nullable();
             $table->smallInteger('Renewal')->nullable();
             // extra fields

            $table->string('applicant')->nullable();
            $table->string('father')->nullable();
            $table->string('email')->nullable();
            $table->string('ResidenceAddress')->nullable();
            $table->string('WardNo')->nullable();
            $table->string('PermanentAddress')->nullable();
            $table->string('WardNo1')->nullable();
            $table->bigInteger('MobileNo')->nullable();
            $table->string('AadharNo')->nullable();
            $table->string('LicenseFrom')->nullable();
            $table->string('LicenseTo')->nullable();
            $table->string('HoldingNo')->nullable();
            $table->string('TradeLicenseNo')->nullable();
            $table->string('GSTNo')->nullable();
            $table->string('EntityName')->nullable();
            $table->string('EntityAddress')->nullable();
            $table->string('BrandDisplayName')->nullable();
            $table->string('BrandDisplayAddress')->nullable();
            $table->string('EntityWardNo')->nullable();
            $table->string('DisplayArea')->nullable();
            $table->string('DisplayType')->nullable();
            $table->string('NoOfHoarding')->nullable();
            $table->string('Longitude')->nullable();
            $table->string('Latitude')->nullable();
            $table->string('InstallationLocation')->nullable();
            $table->string('AadharPath')->nullable();
            $table->string('TradeLicensePath')->nullable();
            $table->string('GPSPhotoPath')->nullable();
            $table->string('HoldingNoPath')->nullable();
            $table->string('GSTNoPath')->nullable();
            $table->string('BrandDisplayPath')->nullable();

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
        Schema::dropIfExists('private_lands');
    }
}
