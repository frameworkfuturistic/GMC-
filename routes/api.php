<?php

use App\Http\Controllers\Api\ShopController;
use App\Http\Controllers\Api\SurveyController;
use App\Http\Controllers\Api\SwmController;
use App\Http\Controllers\Api\TollController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
    Route::post('save-shops', [ShopController::class, 'saveShops']); // Save Shop
    Route::put('edit-shops/{id}', [ShopController::class, 'editShops']); // Update Shop
    Route::get('getshopbyid/{id}', [ShopController::class, 'getShopByID']);
    Route::get('getallshops', [ShopController::class, 'getAllShops']);
    Route::get('getshopcircle', [ShopController::class, 'getShopCircle']);
    Route::get('getshopcirclemarket', [ShopController::class, 'getShopCircleMarket']);
    Route::get('getshopdetails', [ShopController::class, 'getShopDetailsByCircle']);
    Route::post('shoppayment/{id}', [ShopController::class, 'shopPayment']);

    Route::post('shops-old-arrear', [ShopController::class, 'shopOldArrear']);      // Shops Old Arrear
    // Shops

    // Tolls
    Route::get('gettollbyid/{id}', [TollController::class, 'getTollById']);
    Route::get('get-tolls', [TollController::class, 'getAllToll']);

    // Route::get('get-toll-location/{area}', [TollController::class, 'getTollLocationByArea']);
    Route::get('getAreaList', [TollController::class, 'getAreaList']); //Getting Area List

    Route::get('get-toll-location', [TollController::class, 'getTollLocation']);
    Route::get('get-vendor-details', [TollController::class, 'getVendorDetailsByArea']);
    Route::post('toll-payment/{id}', [TollController::class, 'tollPayment']);
    Route::post('save-toll', [TollController::class, 'saveToll']);
    Route::put('update-toll/{id}', [TollController::class, 'updateToll']);

    /**
     * | Survey SWM
     * | Created On-03/12/2022 
     * | Created By-Anshu Kumar
     */
    Route::controller(SwmController::class)->group(function () {
        Route::post('swm/survey', 'store');                         // Save Survey SWM
        Route::post('swm/surveyUpd', 'update');                          // Update Survey SWM
        Route::post('swm/get-by-id', 'getSwmById');                  // Get Swm Survey by ID
        Route::get('swm/get-all-surveys', 'getAllSurveys');          // Get Swm Surveys
    });
});
