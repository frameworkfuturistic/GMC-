<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\BanquetController;
use App\Http\Controllers\DharmasalaController;
use App\Http\Controllers\HostelController;
use App\Http\Controllers\PrivateLandController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// Admin Interface Routes

Route::group(['middleware' => ['cors', 'json.response', 'api.key']], function () {

    // Self advet
    Route::post('rnc/addSelfAdvet', [AdminController::class, 'saveSelfAdvet']);
    Route::put('rnc/updateSelfAdvet/{id}', [AdminController::class, 'updateSelfAdvet']);
    Route::put('rnc/InboxWorkflow/{id}', [AdminController::class, 'SelfAdvetInboxWorkflow']);
    Route::post('rnc/inboxComment/{id}', [AdminController::class, 'addComment']);
    Route::put('rnc/updatePmt/{id}', [AdminController::class, 'updatePmt']);
    // Self Advet

    // Private Land
    Route::post('rnc/addPrivateLand', [PrivateLandController::class, 'savePrivateLand']);
    Route::put('rnc/updatePrivateLand/{id}', [PrivateLandController::class, 'UpdateLand']);
    Route::put('rnc/PrivateLandWorkflow/{id}', [PrivateLandController::class, 'PrivateLandWorkflow']);
    Route::post('rnc/LandInboxComment/{id}', [PrivateLandController::class, 'addComment']);
    // Private Land

    // VEHICLE
    Route::post('rnc/addVehicleAdvet', [VehicleController::class, 'saveVehicleAdvet']);
    Route::put('rnc/updateVehicle/{id}', [VehicleController::class, 'UpdateVehicle']);
    Route::put('rnc/vehicleWorkflow/{id}', [VehicleController::class, 'vehicleWorkflow']);
    Route::post('rnc/VehicleInboxComment/{id}', [VehicleController::class, 'addComment']);
    // VEHICLE

    // MARRIGE/ BANQUET HALL
    Route::post('rnc/addBanquet', [BanquetController::class, 'saveBanquet']);
    Route::put('rnc/updateBanquet/{id}', [BanquetController::class, 'updateBanquet']);
    Route::put('rnc/banquetWorkflow/{id}', [BanquetController::class, 'banquetWorkflow']);
    Route::post('rnc/banquetInboxComment/{id}', [BanquetController::class, 'addComment']);
    // MARRIAGE/ BANQUET HALL

    // HOSTEL/LODGE
    Route::post('rnc/addHostel', [HostelController::class, 'saveHostel']);
    Route::put('rnc/updatehostel/{id}', [HostelController::class, 'updateHostel']);
    Route::put('rnc/hostelWorkflow/{id}', [HostelController::class, 'hostelWorkflow']);
    Route::post('rnc/hostelInboxComment/{id}', [HostelController::class, 'addComment']);
    // HOSTEL/LODGE

    // DHARMASALA
    Route::post('rnc/addDharmasala', [DharmasalaController::class, 'saveDharmasala']);
    Route::put('rnc/updatedharmasala/{id}', [DharmasalaController::class, 'updateDharmasala']);
    Route::put('rnc/dharmasalaWorkflow/{id}', [DharmasalaController::class, 'dharmasalaWorkflow']);
    Route::post('rnc/dharmasalaInboxComment/{id}', [DharmasalaController::class, 'addComment']);
    // DHARMASALA

    // AGENCY
    Route::post('rnc/addAgency', [AgencyController::class, 'addAgency']);
    Route::put('rnc/updateAgency/{id}',[AgencyController::class,'updateAgency']);
    Route::post('rnc/agencyInboxComment/{id}',[AgencyController::class,'addComment']);
    Route::put('rnc/agencyWorkflow/{id}',[AgencyController::class,'agencyWorkflow']);
    // AGENCY

    // AGENCY HOLDER ROUTES

    // AGENCY HOLDER ROUTES

    // Admin Interface Routes

    // Hoarding Survey
    Route::get('/hoardingLogin',[SurveyController::class,'login']);
    Route::get('/hoardingRegister',[SurveyController::class,'register']);
    Route::post('saveSurveyUser',[SurveyController::class,'save']);
    Route::post('checkLogin',[SurveyController::class,'checkLogin']);

    Route::post('AddSurveyHoarding',[SurveyController::class,'AddSurveyHoarding']);
    Route::post('addSurveyShop',[SurveyController::class,'addSurveyShop']);

    Route::get('getSurveyHoarding',[SurveyController::class,'getSurveyHoarding']);
    Route::get('getSurveyShops',[SurveyController::class,'getSurveyShop']);

    Route::post('updateSurveyHoarding',[SurveyController::class,'updateSurveyHoarding']);
    Route::post('updateSurveyShop',[SurveyController::class,'updateSurveyShop']);
    // Hoarding Survey
});