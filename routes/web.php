<?php

use App\Http\Controllers\OTPController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\BanquetController;
use App\Http\Controllers\DharmasalaController;
use App\Http\Controllers\HostelController;
use App\Http\Controllers\PrivateLandController;
use App\Http\Controllers\VehicleController;
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
    return view('index');
});

Route::get('rnc/user/Dashboard', function () {
    return view('user.index');
});

Route::get('rnc/user/selfAdvet', [AdminController::class, 'selfAdvet']);


Route::get('rnc/user/vehicle',[VehicleController::class,'userView']);

Route::get('rnc/user/land',[PrivateLandController::class,'userView']);

Route::get('rnc/user/agency', [AgencyController::class, 'Index']);

Route::get('rnc/user/banquet',[BanquetController::class,'userView']);

Route::get('rnc/user/hostel',[HostelController::class,'userView']);

Route::get('rnc/user/dharmasala',[DharmasalaController::class,'userView']);

/* User Interface Routes */


Route::post('generateOTP', [OTPController::class, 'generate'])->name('generate');

// Admin Interface Routes


Route::middleware(['auth:sanctum', 'verified'])->get('rnc/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// Self Advet
Route::get('rnc/advetInbox', [AdminController::class, 'SelfAdvetInbox']);
Route::get('rnc/updateadvetInbox/{id}', [AdminController::class, 'updateSelfAdvetInbox']);

Route::get('rnc/advetOutbox', [AdminController::class, 'selfAdvetOutbox']);
Route::get('rnc/updateadvetOutbox/{id}', [AdminController::class, 'updateSelfAdvetOutbox']);

Route::get('rnc/advetPayment', [AdminController::class, 'Payment']);

Route::get('rnc/updateadvetPayment/{id}', [AdminController::class, 'paymentDetails']);

Route::get('rnc/advetApproved', [AdminController::class, 'advetApproved']);
Route::get('rnc/updateadvetApproved/{id}', [AdminController::class, 'updateAdvetApproved']);

Route::get('rnc/advetRejected', [AdminController::class, 'advetRejected']);
Route::get('rnc/updateadvetRejected/{id}', [AdminController::class, 'updateAdvetRejected']);
// Self Advet
// Self advet
Route::post('rnc/addSelfAdvet', [AdminController::class, 'saveSelfAdvet']);
Route::put('rnc/updateSelfAdvet/{id}', [AdminController::class, 'updateSelfAdvet']);
Route::put('rnc/InboxWorkflow/{id}', [AdminController::class, 'SelfAdvetInboxWorkflow']);
Route::post('rnc/inboxComment/{id}', [AdminController::class, 'addComment']);
Route::put('rnc/updatePmt/{id}', [AdminController::class, 'updatePmt']);
// Self Advet


// Private Land
Route::get('rnc/LandAdvetInbox', [PrivateLandController::class, 'LandAdvetInbox']);
Route::get('rnc/updateLandInbox/{id}', [PrivateLandController::class, 'UpdateLandInbox']);

Route::get('rnc/LandAdvetOutbox', [PrivateLandController::class, 'LandAdvetOutbox']);
Route::get('rnc/updateLandOutbox/{id}', [PrivateLandController::class, 'updatePrivateLandOutbox']);

Route::get('rnc/landApproved', [PrivateLandController::class, 'landApproved']);
Route::get('rnc/updateLandApproved/{id}', [PrivateLandController::class, 'updateLandApproved']);

Route::get('rnc/landRejected', [PrivateLandController::class, 'landRejected']);
Route::get('rnc/updateLandRejected/{id}', [PrivateLandController::class, 'updateLandRejected']);
// Private Land
 // Private Land
 Route::post('rnc/addPrivateLand', [PrivateLandController::class, 'savePrivateLand']);
 Route::put('rnc/updatePrivateLand/{id}', [PrivateLandController::class, 'UpdateLand']);
 Route::put('rnc/PrivateLandWorkflow/{id}', [PrivateLandController::class, 'PrivateLandWorkflow']);
 Route::post('rnc/LandInboxComment/{id}', [PrivateLandController::class, 'addComment']);
 // Private Land

// VEHICLE 
Route::get('rnc/vehicleInbox', [VehicleController::class, 'vehicleInbox']);
Route::get('rnc/updatevehicleInbox/{id}', [VehicleController::class, 'udpateVehicleInbox']);
Route::get('rnc/vehicleOutbox', [VehicleController::class, 'vehicleOutbox']);
Route::get('rnc/updateVehicleOutbox/{id}', [VehicleController::class, 'updateVehicleOutbox']);
Route::get('rnc/vehicleApproved', [VehicleController::class, 'vehicleApproved']);
Route::get('rnc/updateVehicleApproved/{id}', [VehicleController::class, 'updateVehicleApproved']);
Route::get('rnc/vehicleRejected', [VehicleController::class, 'vehicleRejected']);
Route::get('rnc/updateVehicleRejected/{id}', [VehicleController::class, 'updateVehicleRejected']);
// VEHICLE
// VEHICLE
Route::post('rnc/addVehicleAdvet', [VehicleController::class, 'saveVehicleAdvet']);
Route::put('rnc/updateVehicle/{id}', [VehicleController::class, 'UpdateVehicle']);
Route::put('rnc/vehicleWorkflow/{id}', [VehicleController::class, 'vehicleWorkflow']);
Route::post('rnc/VehicleInboxComment/{id}', [VehicleController::class, 'addComment']);
// VEHICLE

// MARRIAGE/ BANQUET HALL
Route::get('rnc/banquetInbox', [BanquetController::class, 'banquetInbox']);
Route::get('rnc/updateBanquetInbox/{id}', [BanquetController::class, 'updateBanquetInbox']);
Route::get('rnc/banquetOutbox', [BanquetController::class, 'banquetOutbox']);
Route::get('rnc/udpateBanquetOutbox/{id}', [BanquetController::class, 'banquetOutboxUpdate']);
Route::get('rnc/banquetApproved', [BanquetController::class, 'banquetApproved']);
Route::get('rnc/updateBanquetApproved/{id}', [BanquetController::class, 'updateBanquetApproved']);
Route::get('rnc/banquetRejected', [BanquetController::class, 'banquetRejected']);
Route::get('rnc/updateBanquetRejected/{id}', [BanquetController::class, 'updateBanquetRejected']);
// MARRIAGE/BANQUET HALL
 // MARRIGE/ BANQUET HALL
 Route::post('rnc/addBanquet', [BanquetController::class, 'saveBanquet']);
 Route::put('rnc/updateBanquet/{id}', [BanquetController::class, 'updateBanquet']);
 Route::put('rnc/banquetWorkflow/{id}', [BanquetController::class, 'banquetWorkflow']);
 Route::post('rnc/banquetInboxComment/{id}', [BanquetController::class, 'addComment']);
 // MARRIAGE/ BANQUET HALL

// HOSTEL
Route::get('rnc/hostelInbox', [HostelController::class, 'hostelInbox']);
Route::get('rnc/updateHostelInbox/{id}', [HostelController::class, 'updateHostelInbox']);
Route::get('rnc/hostelOutbox', [HostelController::class, 'hostelOutbox']);
Route::get('rnc/updateHostelOutbox/{id}', [HostelController::class, 'hostelOutboxUpdate']);
Route::get('rnc/hostelApproved', [HostelController::class, 'hostelApproved']);
Route::get('rnc/updateHostelApproved/{id}', [HostelController::class, 'updateHostelApproved']);
Route::get('rnc/hostelRejected', [HostelController::class, 'hostelRejected']);
Route::get('rnc/updateHostelRejected/{id}', [HostelController::class, 'updateHostelRejected']);
// HOSTEL
// HOSTEL/LODGE
Route::post('rnc/addHostel', [HostelController::class, 'saveHostel']);
Route::put('rnc/updatehostel/{id}', [HostelController::class, 'updateHostel']);
Route::put('rnc/hostelWorkflow/{id}', [HostelController::class, 'hostelWorkflow']);
Route::post('rnc/hostelInboxComment/{id}', [HostelController::class, 'addComment']);
// HOSTEL/LODGE

// DHARMSALA
Route::get('rnc/dharmasalaInbox', [DharmasalaController::class, 'dharmasalaInbox']);
Route::get('rnc/updatedharmasalaInbox/{id}', [DharmasalaController::class, 'updateDharmasalaInbox']);
Route::get('rnc/dharmasalaOutbox', [DharmasalaController::class, 'dharmasalaOutbox']);
Route::get('rnc/updatedharmasalaOutbox/{id}', [DharmasalaController::class, 'dharmasalaOutboxUpdate']);
Route::get('rnc/dharmasalaApproved', [DharmasalaController::class, 'dharmasalaApproved']);
Route::get('rnc/updateDharmasalaApproved/{id}', [DharmasalaController::class, 'updateDharmasalaApproved']);
Route::get('rnc/dharmasalaRejected', [DharmasalaController::class, 'dharmasalaRejected']);
Route::get('rnc/updateDharmasalaRejected/{id}', [DharmasalaController::class, 'updateDharmasalaRejected']);
// DHARMSALA
// DHARMASALA
Route::post('rnc/addDharmasala', [DharmasalaController::class, 'saveDharmasala']);
Route::put('rnc/updatedharmasala/{id}', [DharmasalaController::class, 'updateDharmasala']);
Route::put('rnc/dharmasalaWorkflow/{id}', [DharmasalaController::class, 'dharmasalaWorkflow']);
Route::post('rnc/dharmasalaInboxComment/{id}', [DharmasalaController::class, 'addComment']);
// DHARMASALA

// AGENCY
Route::get('rnc/agencyInbox', [AgencyController::class, 'Inbox']);
Route::get('rnc/updateInbox/{id}', [AgencyController::class, 'updateInbox']);
Route::get('rnc/agencyOutbox',[AgencyController::class,'Outbox']);
Route::get('rnc/updateAgencyOutbox/{id}',[AgencyController::class,'updateOutbox']);
Route::get('rnc/agencyApproved',[AgencyController::class,'agencyApproved']);
Route::get('rnc/updateApproved/{id}',[AgencyController::class,'updateApproved']);
Route::get('rnc/agencyRejected',[AgencyController::class,'agencyRejected']);
Route::get('rnc/updateRejected/{id}',[AgencyController::class,'updateRejected']);
// AGENCY
// AGENCY
Route::post('rnc/addAgency', [AgencyController::class, 'addAgency']);
Route::put('rnc/updateAgency/{id}',[AgencyController::class,'updateAgency']);
Route::post('rnc/agencyInboxComment/{id}',[AgencyController::class,'addComment']);
Route::put('rnc/agencyWorkflow/{id}',[AgencyController::class,'agencyWorkflow']);
// AGENCY


// Admin Interface Routes

Route::get('agencyDash', function () {
    return view('admin.agencyDash.dashboard');
});

Route::get('rnc/newHoarding',function(){
    return view('admin.agencyDash.newHoarding');
});

Route::get('rnc/lastBill',function(){
    return view('admin.agencyDash.lastBill');
});
