<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoardingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoardings', function (Blueprint $table) {
            $table->id();
            $table->string('RenewalID')->nullable();
            $table->string('ApplicationDate')->nullable();
            $table->string('PermissionFrom')->nullable();
            $table->string('PermissionTo')->nullable();
            $table->string('HoardingNo')->nullable();
            $table->string('LicenseYear')->nullable();
            $table->mediumText('Zone')->nullable();
            $table->mediumText('Location')->nullable();
            $table->string('Longitude')->nullable();
            $table->string('Latitude')->nullable();
            $table->integer('Length')->nullable();
            $table->integer('Width')->nullable();
            $table->integer('BoardArea')->nullable();
            $table->mediumText('MaterialType')->nullable();
            $table->mediumText('Illumination')->nullable();
            $table->mediumText('Face')->nullable();
            $table->string('Landmark')->nullable();
            $table->mediumText('HoardingCategory')->nullable();
            $table->mediumText('PropertyType')->nullable();
            $table->mediumText('OwnerName')->nullable();
            $table->mediumText('OwnerAddress')->nullable();
            $table->mediumText('OwnerCity')->nullable();
            $table->mediumText('OwnerPhone')->nullable();
            $table->mediumText('OwnerWhatsApp')->nullable();
            $table->mediumText('BuildingPermitPath')->nullable();
            $table->mediumText('SitePhotographPath')->nullable();
            $table->mediumText('EngineerCertificatePath')->nullable();
            $table->mediumText('AgreementPath')->nullable();
            $table->mediumText('GPSPhotographPath')->nullable();
            $table->mediumText('SketchPlanPath')->nullable();
            $table->mediumText('PendingDuesPath')->nullable();
            $table->mediumText('ArchitecturalDrawingPath')->nullable();
            $table->mediumText('Proceeding1Photo')->nullable();
            $table->mediumText('Proceeding2Photo')->nullable();
            $table->mediumText('Proceeding3Photo')->nullable();
            $table->mediumText('ExtraDoc1')->nullable();
            $table->mediumText('ExtraDoc2')->nullable();
            $table->smallInteger('Approved')->nullable();
            $table->smallInteger('Rejected')->nullable();
            $table->dateTime('ApprovalDate')->nullable();
            $table->string('PermitNo')->nullable();
            $table->string('PermitIssueDate')->nullable();
            $table->string('PermitExpirationDate')->nullable();
            $table->string('Remarks')->nullable();
            $table->integer('WorkflowID')->nullable();
            $table->mediumText('CurrentUser')->nullable();
            $table->mediumText('Initiator')->nullable();
            $table->mediumText('Approver')->nullable();
            $table->smallInteger('Pending')->nullable();
            $table->smallInteger('Paid')->nullable();
            $table->mediumText('RejectionReason')->nullable();
            $table->mediumText('ApplicationStatus')->nullable();
            $table->decimal('LicenseFee', 18, 2)->nullable();
            $table->decimal('Amount', 18, 2)->nullable();
            $table->decimal('GST', 18, 2)->nullable();
            $table->decimal('NetAmount', 18, 2)->nullable();
            $table->mediumText('PmtMode')->nullable();
            $table->mediumText('Bank')->nullable();
            $table->mediumText('MRNo')->nullable();
            $table->mediumText('DraftNo')->nullable();
            $table->dateTime('PaymentDate')->nullable();
            $table->dateTime('DraftDate')->nullable();
            $table->mediumText('SignaturePath')->nullable();
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
        Schema::dropIfExists('hoardings');
    }
}
