<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\BanquetController;
use App\Http\Controllers\DharmasalaController;
use App\Http\Controllers\HostelController;
use App\Http\Controllers\PrivateLandController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::post('checkLogin',[SurveyController::class,'checkLogin']);
Route::post('saveSurveyUser',[SurveyController::class,'saveSurveyUser']);
// Forget Password
Route::get('forgetPassword',[SurveyController::class,'forgetPassword']);
// Forget Password

Route::group(['middleware' => ['cors', 'json.response', 'api.key','auth:sanctum']], function () {

    // Hoarding Survey
    Route::get('/hoardingLogin',[SurveyController::class,'login']);
    Route::get('/hoardingRegister',[SurveyController::class,'register']);

    Route::post('addSurveyHoarding',[SurveyController::class,'AddSurveyHoarding']);
    Route::post('addSurveyShop',[SurveyController::class,'addSurveyShop']);
    Route::post('addSurveySeptic',[SurveyController::class,'addSurveySepticLatrine']);

    Route::get('getSurveyHoarding',[SurveyController::class,'getSurveyHoarding']);
    Route::get('getAllSurveyHoarding',[SurveyController::class,'getAllSurveyHoarding']);
    Route::get('getSurveyShops',[SurveyController::class,'getSurveyShop']);
    Route::get('getSurveySeptic',[SurveyController::class,'getSurveySepticLatrine']);
    Route::get('getAllSurveyShops',[SurveyController::class,'getAllSurveyShop']);

    Route::get('getSurveyHoardingByID',[SurveyController::class,'getSurveyHoardingByID']);
    Route::get('getSurveyShopByID',[SurveyController::class,'getSurveyShopByID']);

    Route::post('updateSurveyHoarding',[SurveyController::class,'updateSurveyHoarding']);
    Route::post('updateSurveyShop',[SurveyController::class,'updateSurveyShop']);

    // Shop Attributes
    Route::get('getCircleList',[SurveyController::class,'getCircleList']);
    Route::get('getBuildingType',[SurveyController::class,'getBuildingType']);
    Route::get('getFloor',[SurveyController::class,'getFloor']);
    Route::get('gethoardingtypes',[SurveyController::class,'getHoardingTypes']);

    // Shop Attributes
    // Hoarding Survey

    // Shops
    Route::get('getAreaList',[ShopController::class,'getAreaList']);     //Getting Area List
    Route::get('getShopByArea',[ShopController::class,'getShopByArea']); // Getting Shop By Area
    Route::get('getAllShops',[ShopController::class,'getAllShops']);     // Get All Shops
    // Shops
});
