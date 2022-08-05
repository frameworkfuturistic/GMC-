<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\surveyLogin;
use App\Notifications\EmailNotification;
use App\Repository\Survey\EloquentSurveyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class SurveyController extends Controller
{
    protected $eloquentSurveyRepository;
    // Initializing construct function
    public function __construct(EloquentSurveyRepository $eloquentSurveyRepository)
    {
        $this->RepositorySurvey = $eloquentSurveyRepository;
    }

    // ADD SURVEY USER
    public function saveSurveyUser(Request $request)
    {
        return $this->RepositorySurvey->saveSurveyUser($request);
    }

    // Login Authentication
    public function checkLogin(Request $request)
    {
        return $this->RepositorySurvey->checkLogin($request);
    }

    // Forget Password
    public function forgetPassword(Request $request)
    {
        $password = Str::random(20);
        $data = surveyLogin::where('email', '=', $request->email)->get()->first();
        if ($data) {
            $details = [
                'RecoveryPassword' => $password,
            ];
            // Updating Password
            $data->password = Hash::make($password);
            $data->save();
            // Updating Password
            Notification::send($data, new EmailNotification($details));
            // $notification=Notification::route('mail', $email)->notify(new EmailNotification($details));
            $response = [
                'status' => true,
                'message' => 'Password has been Sent on Your Email',
            ];
            return response($response, 200);
        } else {
            $response = [
                'status' => false,
                'message' => 'Email Not Found',
            ];
            return response($response, 404);
        }
    }

    //MASTERS
    public function getCircleList()
    {
        return $this->RepositorySurvey->getCircleList();
    }

    public function getBuildingType()
    {
        return $this->RepositorySurvey->getBuildingType();
    }

    public function getFloor()
    {
        return $this->RepositorySurvey->getFloor();
    }

    public function getHoardingTypes()
    {
        return $this->RepositorySurvey->getHoardingTypes();
    }

    //HOARDING SURVEY
    public function AddSurveyHoarding(Request $request)
    {
        return $this->RepositorySurvey->AddSurveyHoarding($request);
    }

    public function getSurveyHoarding(Request $request)
    {
        return $this->RepositorySurvey->getSurveyHoarding($request);
    }

    public function getSurveyHoardingByID(Request $request)
    {
        return $this->RepositorySurvey->getSurveyHoardingByID($request);
    }

    public function getAllSurveyHoarding()
    {
        return $this->RepositorySurvey->getAllSurveyHoarding();
    }

    public function updateSurveyHoarding(Request $request)
    {
        return $this->RepositorySurvey->updateSurveyHoarding($request);
    }

    //SHOP SURVEY
    public function addSurveyShop(Request $request)
    {
        return $this->RepositorySurvey->addSurveyShop($request);
    }

    public function getSurveyShop()
    {
        return $this->RepositorySurvey->getSurveyShop();
    }

    public function getSurveyShopByID(Request $request)
    {
        return $this->RepositorySurvey->getSurveyShopByID($request);
    }

    public function getAllSurveyShop()
    {
        return $this->RepositorySurvey->getAllSurveyShop();
    }

    public function updateSurveyShop(Request $request)
    {
        return $this->RepositorySurvey->updateSurveyShop($request);
    }

    //SEPTIC LATRINE
    public function addSurveySepticLatrine(Request $request)
    {
        return $this->RepositorySurvey->addSurveySepticLatrine($request);
    }

    public function getSurveySepticLatrine()
    {
        return $this->RepositorySurvey->getSurveySepticLatrine();
    }
}
