<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BanquetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DesignationRoleController;
use App\Http\Controllers\DharmasalaController;
use App\Http\Controllers\HoardingController;
use App\Http\Controllers\HostelController;
use App\Http\Controllers\OTPController;
use App\Http\Controllers\PrivateLandController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TollController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\WorkflowController;
use App\Models\Designation;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

/* User Interface Routes   */

Route::get('/', function () {
    return view('user.index');
});

// Self Advertisement
Route::get('rnc/user/selfAdvet', [AdminController::class, 'selfAdvet']);
Route::post('rnc/addSelfAdvet', [AdminController::class, 'saveSelfAdvet']);

Route::get('rnc/user/vehicle', [VehicleController::class, 'userView']);
Route::post('rnc/addVehicleAdvet', [VehicleController::class, 'saveVehicleAdvet']);

Route::get('rnc/user/land', [PrivateLandController::class, 'userView']);
Route::post('rnc/addPrivateLand', [PrivateLandController::class, 'savePrivateLand']);

Route::get('rnc/user/agency', [AgencyController::class, 'Index']);
Route::post('rnc/addAgency', [AgencyController::class, 'addAgency']);

Route::get('rnc/user/banquet', [BanquetController::class, 'userView']);
Route::post('rnc/addBanquet', [BanquetController::class, 'saveBanquet']);

Route::get('rnc/user/hostel', [HostelController::class, 'userView']);
Route::post('rnc/addHostel', [HostelController::class, 'saveHostel']);

Route::get('rnc/user/dharmasala', [DharmasalaController::class, 'userView']);
Route::post('rnc/addDharmasala', [DharmasalaController::class, 'saveDharmasala']);

/* User Interface Routes */

Route::post('otp-master', [OTPController::class, 'generate'])->name('generate');
Route::post('user-authentication', [OTPController::class, 'authenticateOtp']);


// -------------------------------------------------------------------------------------------------------

// Admin Interface Routes

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('register', function () {
        return back();
    });

    Route::get('rnc/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ADD ADMIN or USERS
    Route::get('rnc/add-users', [RegisterController::class, 'index']);
    Route::post('rnc/store-users', [RegisterController::class, 'store']);
    // ADD ADMIN OR USERS

    // Self Advet
    Route::get('rnc/advetInbox', [AdminController::class, 'SelfAdvetInbox']);
    Route::get('rnc/updateadvetInbox/{id}', [AdminController::class, 'updateSelfAdvetInbox']);

    Route::get('rnc/advetOutbox', [AdminController::class, 'selfAdvetOutbox'])->name('selfAdvet.Outbox');
    Route::get('rnc/updateadvetOutbox/{id}', [AdminController::class, 'updateSelfAdvetOutbox']);

    Route::get('rnc/advetPayment', [AdminController::class, 'Payment']);

    Route::get('rnc/updateadvetPayment/{id}', [AdminController::class, 'paymentDetails']);

    Route::get('rnc/advetApproved', [AdminController::class, 'advetApproved'])->name('advet.approved');
    Route::get('rnc/updateadvetApproved/{id}', [AdminController::class, 'updateAdvetApproved']);

    Route::get('rnc/advetRejected', [AdminController::class, 'advetRejected'])->name('advet.rejected');
    Route::get('rnc/updateadvetRejected/{id}', [AdminController::class, 'updateAdvetRejected']);
    // Self Advet
    // Self advet
    Route::put('rnc/updateSelfAdvet/{id}', [AdminController::class, 'updateSelfAdvet']);
    Route::put('rnc/InboxWorkflow/{id}', [AdminController::class, 'SelfAdvetInboxWorkflow']);
    Route::post('rnc/inboxComment/{id}', [AdminController::class, 'addComment']);
    Route::put('rnc/updatePmt/{id}', [AdminController::class, 'updatePmt']);
    // Self Advet

    // Private Land
    Route::get('rnc/LandAdvetInbox', [PrivateLandController::class, 'LandAdvetInbox']);
    Route::get('rnc/updateLandInbox/{id}', [PrivateLandController::class, 'UpdateLandInbox']);

    Route::get('rnc/LandAdvetOutbox', [PrivateLandController::class, 'LandAdvetOutbox'])->name('land.outbox');
    Route::get('rnc/updateLandOutbox/{id}', [PrivateLandController::class, 'updatePrivateLandOutbox']);

    Route::get('rnc/LandAdvetApproved', [PrivateLandController::class, 'landApproved'])->name('land.approved');
    Route::get('rnc/updateLandApproved/{id}', [PrivateLandController::class, 'updateLandApproved']);

    Route::get('rnc/LandAdvetRejected', [PrivateLandController::class, 'landRejected'])->name('land.rejected');
    Route::get('rnc/updateLandRejected/{id}', [PrivateLandController::class, 'updateLandRejected']);
    // Private Land
    // Private Land
    Route::put('rnc/updatePrivateLand/{id}', [PrivateLandController::class, 'UpdateLand']);
    Route::put('rnc/PrivateLandWorkflow/{id}', [PrivateLandController::class, 'PrivateLandWorkflow']);
    Route::post('rnc/LandInboxComment/{id}', [PrivateLandController::class, 'addComment']);
    // Private Land

    // VEHICLE
    Route::get('rnc/vehicleInbox', [VehicleController::class, 'vehicleInbox']);
    Route::get('rnc/updatevehicleInbox/{id}', [VehicleController::class, 'udpateVehicleInbox']);
    Route::get('rnc/vehicleOutbox', [VehicleController::class, 'vehicleOutbox'])->name('vehicle.outbox');
    Route::get('rnc/updateVehicleOutbox/{id}', [VehicleController::class, 'updateVehicleOutbox']);
    Route::get('rnc/vehicleApproved', [VehicleController::class, 'vehicleApproved'])->name('vehicle.approved');
    Route::get('rnc/updateVehicleApproved/{id}', [VehicleController::class, 'updateVehicleApproved']);
    Route::get('rnc/vehicleRejected', [VehicleController::class, 'vehicleRejected'])->name('vehicle.rejected');
    Route::get('rnc/updateVehicleRejected/{id}', [VehicleController::class, 'updateVehicleRejected']);
    // VEHICLE
    // VEHICLE
    Route::put('rnc/updateVehicle/{id}', [VehicleController::class, 'UpdateVehicle']);
    Route::put('rnc/vehicleWorkflow/{id}', [VehicleController::class, 'vehicleWorkflow']);
    Route::post('rnc/VehicleInboxComment/{id}', [VehicleController::class, 'addComment']);
    // VEHICLE

    // MARRIAGE/ BANQUET HALL
    Route::get('rnc/banquetInbox', [BanquetController::class, 'banquetInbox']);
    Route::get('rnc/updateBanquetInbox/{id}', [BanquetController::class, 'updateBanquetInbox']);
    Route::get('rnc/banquetOutbox', [BanquetController::class, 'banquetOutbox'])->name('banquet.outbox');
    Route::get('rnc/udpateBanquetOutbox/{id}', [BanquetController::class, 'banquetOutboxUpdate']);
    Route::get('rnc/banquetApproved', [BanquetController::class, 'banquetApproved'])->name('banquet.approved');
    Route::get('rnc/updateBanquetApproved/{id}', [BanquetController::class, 'updateBanquetApproved']);
    Route::get('rnc/banquetRejected', [BanquetController::class, 'banquetRejected'])->name('banquet.rejected');
    Route::get('rnc/updateBanquetRejected/{id}', [BanquetController::class, 'updateBanquetRejected']);
    // MARRIAGE/BANQUET HALL
    // MARRIGE/ BANQUET HALL
    Route::put('rnc/updateBanquet/{id}', [BanquetController::class, 'updateBanquet']);
    Route::put('rnc/banquetWorkflow/{id}', [BanquetController::class, 'banquetWorkflow']);
    Route::post('rnc/banquetInboxComment/{id}', [BanquetController::class, 'addComment']);
    // MARRIAGE/ BANQUET HALL

    // HOSTEL
    Route::get('rnc/hostelInbox', [HostelController::class, 'hostelInbox']);
    Route::get('rnc/updateHostelInbox/{id}', [HostelController::class, 'updateHostelInbox']);
    Route::get('rnc/hostelOutbox', [HostelController::class, 'hostelOutbox'])->name('hostel.outbox');
    Route::get('rnc/updateHostelOutbox/{id}', [HostelController::class, 'hostelOutboxUpdate']);
    Route::get('rnc/hostelApproved', [HostelController::class, 'hostelApproved'])->name('hostel.approved');
    Route::get('rnc/updateHostelApproved/{id}', [HostelController::class, 'updateHostelApproved']);
    Route::get('rnc/hostelRejected', [HostelController::class, 'hostelRejected'])->name('hostel.rejected');
    Route::get('rnc/updateHostelRejected/{id}', [HostelController::class, 'updateHostelRejected']);
    // HOSTEL
    // HOSTEL/LODGE
    Route::put('rnc/updatehostel/{id}', [HostelController::class, 'updateHostel']);
    Route::put('rnc/hostelWorkflow/{id}', [HostelController::class, 'hostelWorkflow']);
    Route::post('rnc/hostelInboxComment/{id}', [HostelController::class, 'addComment']);
    // HOSTEL/LODGE

    // DHARMSALA
    Route::get('rnc/dharmasalaInbox', [DharmasalaController::class, 'dharmasalaInbox']);
    Route::get('rnc/updatedharmasalaInbox/{id}', [DharmasalaController::class, 'updateDharmasalaInbox']);
    Route::get('rnc/dharmasalaOutbox', [DharmasalaController::class, 'dharmasalaOutbox'])->name('dharmasala.outbox');
    Route::get('rnc/updatedharmasalaOutbox/{id}', [DharmasalaController::class, 'dharmasalaOutboxUpdate']);
    Route::get('rnc/dharmasalaApproved', [DharmasalaController::class, 'dharmasalaApproved'])->name('dharmsala.approved');
    Route::get('rnc/updateDharmasalaApproved/{id}', [DharmasalaController::class, 'updateDharmasalaApproved']);
    Route::get('rnc/dharmasalaRejected', [DharmasalaController::class, 'dharmasalaRejected'])->name('dharmsala.rejected');
    Route::get('rnc/updateDharmasalaRejected/{id}', [DharmasalaController::class, 'updateDharmasalaRejected']);
    // DHARMSALA
    // DHARMASALA
    Route::put('rnc/updatedharmasala/{id}', [DharmasalaController::class, 'updateDharmasala']);
    Route::put('rnc/dharmasalaWorkflow/{id}', [DharmasalaController::class, 'dharmasalaWorkflow']);
    Route::post('rnc/dharmasalaInboxComment/{id}', [DharmasalaController::class, 'addComment']);
    // DHARMASALA

    // AGENCY
    Route::get('rnc/agencyInbox', [AgencyController::class, 'Inbox']);
    Route::get('rnc/updateInbox/{id}', [AgencyController::class, 'updateInbox']);
    Route::get('rnc/agencyOutbox', [AgencyController::class, 'Outbox'])->name('agency.outbox');
    Route::get('rnc/updateAgencyOutbox/{id}', [AgencyController::class, 'updateOutbox']);
    Route::get('rnc/agencyApproved', [AgencyController::class, 'agencyApproved'])->name('agency.approved');
    Route::get('rnc/updateApproved/{id}', [AgencyController::class, 'updateApproved']);
    Route::get('rnc/agencyRejected', [AgencyController::class, 'agencyRejected'])->name('agency.rejected');
    Route::get('rnc/updateRejected/{id}', [AgencyController::class, 'updateRejected']);
    // AGENCY
    // AGENCY
    Route::put('rnc/updateAgency/{id}', [AgencyController::class, 'updateAgency']);
    Route::post('rnc/agencyInboxComment/{id}', [AgencyController::class, 'addComment']);
    Route::put('rnc/agencyWorkflow/{id}', [AgencyController::class, 'agencyWorkflow']);
    // AGENCY

    // AGENCY ACCOUNT OCCUPIED DASHBOARD
    Route::get('rnc/newHoarding', [HoardingController::class, 'newHoarding']);
    Route::get('rnc/lastBill', [HoardingController::class, 'lastBill']);
    Route::get('rnc/hoardingPayment', [HoardingController::class, 'hoardingPayment']);
    Route::get('rnc/currentHoarding', [HoardingController::class, 'currentHoarding']);
    Route::get('rnc/rejectedHoarding', [HoardingController::class, 'rejectedHoarding']);
    Route::get('rnc/vendorProfile', [HoardingController::class, 'vendorProfile']);
    Route::get('rnc/hoardingRules', [HoardingController::class, 'hoardingRules']);
    Route::post('storeHoarding', [HoardingController::class, 'storeHoarding']);
    // AGENCY ACCOUNT OCCUPIED DASHBOARD

    // HOARDING
    /* VIEW PART */
    Route::get('rnc/hoarding-inbox', [HoardingController::class, 'hoardingInbox']);
    Route::get('rnc/hoarding-inbox/{id}', [HoardingController::class, 'hoardingInboxByID']);

    Route::get('rnc/hoarding-outbox', [HoardingController::class, 'hoardingOutbox']);
    Route::get('rnc/hoarding-outbox/{id}', [HoardingController::class, 'hoardingOutboxByID']);

    Route::get('rnc/hoarding-payment', [HoardingController::class, 'hoardingPmt']);

    Route::get('rnc/hoarding-approved', [HoardingController::class, 'hoardingApproved']);
    Route::get('rnc/hoarding-approved/{id}', [HoardingController::class, 'hoardingApprovedByID']);

    Route::get('rnc/hoarding-rejected', [HoardingController::class, 'hoardingRejected']);
    Route::get('rnc/hoarding-rejected/{id}', [HoardingController::class, 'hoardingRejectedByID']);
    /*  VIEW PART  */

    /* UPDATE HOARDING DETAILS*/
    Route::post('rnc/edit-hoarding/{id}', [HoardingController::class, 'editHoarding']);
    /* UPDATE HOARDING DETAILS */
    /* COMMENT */
    Route::post('rnc/hoarding-inbox-comment', [HoardingController::class, 'addComment']);
    /* COMMENT */
    Route::post('rnc/hoardingWorkflow', [HoardingController::class, 'hoardingWorkflow']);

    // HOARDING

    // Toll
    Route::post('tollcollection', [TollController::class, 'totalCollection']);
    Route::get('tolls/masters/toll-master', [TollController::class, 'tollMaster'])->name('toll.master');
    Route::get('export/tolls/toll-master', [TollController::class, 'exportToExcel']);
    Route::get('tolls/bills/toll-bill-payments', [TollController::class, 'tollBillPayments']);
    Route::post('tolls/bills/toll-bill-payments', [TollController::class, 'postTollBillPayments']);

    // Shops
    Route::get('rnc/AddShops', [ShopController::class, 'shopMasterView'])->name('shops.master');
    Route::get('rnc/getShops/{id}', [ShopController::class, 'getShopByID']);
    Route::post('rnc/editShops', [ShopController::class, 'editShops']);
    Route::get('shops/payments/bill-payments', [ShopController::class, 'billPaymentView']);
    Route::post('shops/payments/bill-payments', [ShopController::class, 'postBillPayment'])->middleware('request_logger');    // Save Shop Payment

    Route::get('rnc/BillShops', [ShopController::class, 'shopBillView']);
    Route::get('shopSummary', [ShopController::class, 'shopSummaryView']);
    Route::post('shops/totalshopcollection', [ShopController::class, 'totalShopCollection']);
    Route::get('export/shops/shop-master', [ShopController::class, 'exportToExcel']);
    // Shops

    /**
     * ---------------------------------------------------------------------------------------------------------------------
     * Routes with designations CRUD operations
     * ---------------------------------------------------------------------------------------------------------------------
     */
    Route::get('Designations', [DesignationController::class, 'designationView']); // Designations View
    Route::post('add-designation', [DesignationController::class, 'addDesignation']); // Save New Designation
    Route::post('update-designation', [DesignationController::class, 'updateDesignation']); // Update Designation By ID
    Route::get('get-designations', [DesignationController::class, 'getDesignations']); // Get All Designations
    Route::get('get-designation-by-id/{id}', [DesignationController::class, 'getDesignationByID']); // Get Designation By ID

    /**
     * --------------------------------------------------------------------------------------------------------------------
     * | Designation Role Crud Operations
     * --------------------------------------------------------------------------------------------------------------------
     */
    Route::get('DesignationRole', [DesignationRoleController::class, 'designationRoleView']); // Designation Role Entry View
    Route::post('add-designation-role', [DesignationRoleController::class, 'addDesignationRole']); // Add New Designation Role
    Route::post('update-designation-role', [DesignationRoleController::class, 'updateDesignationRole']); // Update Designation Role
    Route::get('get-role-by-designation-id/{id}', [DesignationRoleController::class, 'getRoleByDesignationID']); // Get Role By DesignationID
    Route::get('get-designation-role-by-id/{id}', [DesignationRoleController::class, 'getDesignationRoleByID']); // Get Designation Role By ID

    Route::get('Permissions', [DesignationController::class, 'permissionView']);

    /**
     * ---------------------------------------------------------------------------------------------------------------------
     * Routes with workflow entries, modifications and workflow candidates
     * ---------------------------------------------------------------------------------------------------------------------
     */
    Route::get('Workflow', [WorkflowController::class, 'workflowView']);

    // Admin Interface Routes

});
