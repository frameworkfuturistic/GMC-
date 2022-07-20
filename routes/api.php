<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\TollController;
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
Route::post('checkLogin', [SurveyController::class, 'checkLogin']);
Route::post('saveSurveyUser', [SurveyController::class, 'saveSurveyUser']);
// Forget Password
Route::get('forgetPassword', [SurveyController::class, 'forgetPassword']);
// Forget Password

Route::group(['middleware' => ['cors', 'json.response', 'api.key', 'auth:sanctum']], function () {

    // Hoarding Survey
    Route::get('/hoardingLogin', [SurveyController::class, 'login']);
    Route::get('/hoardingRegister', [SurveyController::class, 'register']);

    Route::post('addSurveyHoarding', [SurveyController::class, 'AddSurveyHoarding']);
    Route::post('addSurveyShop', [SurveyController::class, 'addSurveyShop']);
    Route::post('addSurveySeptic', [SurveyController::class, 'addSurveySepticLatrine']);

    Route::get('getSurveyHoarding', [SurveyController::class, 'getSurveyHoarding']);
    Route::get('getAllSurveyHoarding', [SurveyController::class, 'getAllSurveyHoarding']);
    Route::get('getSurveyShops', [SurveyController::class, 'getSurveyShop']);
    Route::get('getSurveySeptic', [SurveyController::class, 'getSurveySepticLatrine']);
    Route::get('getAllSurveyShops', [SurveyController::class, 'getAllSurveyShop']);

    Route::get('getSurveyHoardingByID', [SurveyController::class, 'getSurveyHoardingByID']);
    Route::get('getSurveyShopByID', [SurveyController::class, 'getSurveyShopByID']);

    Route::post('updateSurveyHoarding', [SurveyController::class, 'updateSurveyHoarding']);
    Route::post('updateSurveyShop', [SurveyController::class, 'updateSurveyShop']);

    // Shop Attributes
    Route::get('getCircleList', [SurveyController::class, 'getCircleList']);
    Route::get('getBuildingType', [SurveyController::class, 'getBuildingType']);
    Route::get('getFloor', [SurveyController::class, 'getFloor']);
    Route::get('gethoardingtypes', [SurveyController::class, 'getHoardingTypes']);

    // Shop Attributes
    // Hoarding Survey

    // Shops
    Route::post('save-shops', [ShopController::class, 'saveShops']);     // Save Shop
    Route::put('edit-shops/{id}', [ShopController::class, 'editShops']);     // Update Shop

    Route::get('getAreaList', [ShopController::class, 'getAreaList']); //Getting Area List
    Route::get('getShopByArea', [ShopController::class, 'getShopByArea']); // Getting Shop By Area
    Route::get('getAllShops', [ShopController::class, 'getAllShops']); // Get All Shops

    Route::post('shopPayments', [ShopController::class, 'shopPayments']); //Save Shop Payments
    Route::put('updateShopPayments/{id}', [ShopController::class, 'updateShopPayments']);
    // Shops

    // Tolls
    Route::get('get-tolls/{id}', [TollController::class, 'getToll']);
    Route::get('get-tolls', [TollController::class, 'getAllToll']);

    // Route::get('get-toll-location/{area}', [TollController::class, 'getTollLocationByArea']);
    Route::get('get-toll-location', [TollController::class, 'getTollLocation']);
    Route::get('get-vendor-details', [TollController::class, 'getVendorDetailsByArea']);
    Route::post('toll-payment/{id}', [TollController::class, 'tollPayment']);
    Route::post('save-toll', [TollController::class, 'saveToll']);
    Route::put('update-toll/{id}', [TollController::class, 'updateToll']);
});
