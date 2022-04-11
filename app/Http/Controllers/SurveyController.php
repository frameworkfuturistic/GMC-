<?php

namespace App\Http\Controllers;

use App\Models\surveyHoarding;
use App\Models\surveyLogin;
use App\Models\surveyShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SurveyController extends Controller
{
    public function login()
    {
        return view('hoardingSurvey.login');
    }

    public function register()
    {
        return view('hoardingSurvey.register');
    }

    public function save(Request $request)
    {
        //dd($request->all());

        // validate requests
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:survey_logins',
            'password' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->first();
            $response = ['status' => false, 'message' => $error];
            return response($response, 200);
        }

        $user = new surveyLogin;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $token = Str::random(80);
        $user->token = $token;
        $save = $user->save();

        if ($save) {
            $response = ['status' => true, 'message' => 'Please Login to Continue'];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => 'Something went wrong, try again later'];
            return response($response, 500);
        }
    }

    public function checkLogin(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:15',
        ]);

        $userinfo = surveyLogin::where('email', '=', $request->email)->first();
        if (!$userinfo) {
            $response = ['status' => false, 'message' => 'Oops! Given email does not exist'];
            return response($response, 401);
        } else {
            if (Hash::check($request->password, $userinfo->password)) {
                $request->session()->put('LoggedUser', $userinfo->id);
                $token = $userinfo->token;
                $response = ['status' => true, 'message' => $token];
                return response($response, 200);
            } else {
                $response=['status'=>false,'message'=>'Incorrect Password'];
                return response($response, 401);
            }
        }
    }

    public function AddSurveyHoarding(Request $request)
    {
        // dd($request->all());
        // Validation
        $validator = Validator::make($request->all(), [
            'hoardingLocation' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'image1' => 'required',
            'image2' => 'required',
            'length' => 'required',
            'width' => 'required',
            'hoardingType' => 'required',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->first();
            $response = ['status' => false, 'message' => $error];
            return response($response, 200);
        }
        $tokenID = ['LoggedUserInfo' => surveyLogin::where('id', '=', session('LoggedUser'))->first()];

        $surveyHoarding = new surveyHoarding;
        $surveyHoarding->hoardingLocation = $request->hoardingLocation;
        $surveyHoarding->Longitude = $request->longitude;
        $surveyHoarding->Latitude = $request->latitude;
        $surveyHoarding->Length = $request->length;
        $surveyHoarding->Width = $request->width;
        $surveyHoarding->hoardingType = $request->hoardingType;
        $surveyHoarding->UserID = $tokenID['LoggedUserInfo']['token'];

        // Upload Documents

        $image1 = $request->image1;
        if ($image1) {
            $image1Name = time() . '.' . $image1->getClientOriginalName();
            $request->image1->move('surveyFiles', $image1Name);
            $surveyHoarding->Image1 = 'surveyFiles/' . $image1Name;
        }

        $image2 = $request->image2;
        if ($image2) {
            $image2Name = time() . '.' . $image2->getClientOriginalName();
            $request->image2->move('surveyFiles', $image2Name);
            $surveyHoarding->Image2 = 'surveyFiles/' . $image2Name;
        }

        // Upload Documents
        $save = $surveyHoarding->save();

        if ($save) {
            $response = ['status' => true, 'message' => 'Successfully Saved The Data'];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => 'Oops! Something Went Wrong'];
            return response($response, 200);
        }
    }

    public function addSurveyShop(Request $request)
    {
        //dd($request->all());

        $shop = new surveyShop;
        $tokenID = ['LoggedUserInfo' => surveyLogin::where('id', '=', session('LoggedUser'))->first()];
        $shop->AreaName = $request->areaName;
        $shop->Landmark = $request->landmark;
        $shop->Address = $request->address;
        $shop->Owner = $request->owner;
        $shop->Latitude = $request->latitude;
        $shop->Longitude = $request->longitude;
        $shop->UserID = $tokenID['LoggedUserInfo']['token'];

        // Upload Documents

        $image1 = $request->image1;
        if ($image1) {
            $image1Name = time() . '.' . $image1->getClientOriginalName();
            $request->image1->move('surveyFiles', $image1Name);
            $shop->Image1 = 'surveyFiles/' . $image1Name;
        }

        $image2 = $request->image2;
        if ($image2) {
            $image2Name = time() . '.' . $image2->getClientOriginalName();
            $request->image2->move('surveyFiles', $image2Name);
            $shop->Image2 = 'surveyFiles/' . $image2Name;
        }

        // Upload Documents

        $save = $shop->save();

        if ($save) {
            $response = ['status' => true, 'message' => 'Successfully Saved The Data'];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => 'Oops! Something Went Wrong'];
            return response($response, 200);
        }
    }

    public function getSurveyHoarding()
    {
        $tokenID = ['LoggedUserInfo' => surveyLogin::where('id', '=', session('LoggedUser'))->first()];
        $data = SurveyHoarding::where('UserID', '=', $tokenID['LoggedUserInfo']['token'])->get();
        return $data;
    }

    public function getSurveyShop()
    {
        $tokenID = ['LoggedUserInfo' => surveyLogin::where('id', '=', session('LoggedUser'))->first()];
        $data = surveyShop::where('UserID', '=', $tokenID['LoggedUserInfo']['token'])->get();
        return $data;
    }

    // update Survey Hoarding
    public function updateSurveyHoarding(Request $request)
    {

        //dd($request->all());
        // Validation
        $validator = Validator::make($request->all(), [
            'hoardingLocation' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'image1' => 'required',
            'image2' => 'required',
            'length' => 'required',
            'width' => 'required',
            'hoardingType' => 'required',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->first();
            $response = ['status' => false, 'message' => $error];
            return response($response, 200);
        }

        $surveyHoarding = surveyHoarding::find($request->id);
        $tokenID = ['LoggedUserInfo' => surveyLogin::where('id', '=', session('LoggedUser'))->first()];

        $surveyHoarding->hoardingLocation = $request->hoardingLocation;
        $surveyHoarding->Longitude = $request->longitude;
        $surveyHoarding->Latitude = $request->latitude;
        $surveyHoarding->Length = $request->length;
        $surveyHoarding->Width = $request->width;
        $surveyHoarding->hoardingType = $request->hoardingType;
        $surveyHoarding->UserID = $tokenID['LoggedUserInfo']['token'];
        // return $tokenID->token;

        // Upload Documents

        $image1 = $request->image1;
        if ($image1) {
            $image1Name = time() . '.' . $image1->getClientOriginalName();
            $request->image1->move('surveyFiles', $image1Name);
            $surveyHoarding->Image1 = 'surveyFiles/' . $image1Name;
        }

        $image2 = $request->image2;
        if ($image2) {
            $image2Name = time() . '.' . $image2->getClientOriginalName();
            $request->image2->move('surveyFiles', $image2Name);
            $surveyHoarding->Image2 = 'surveyFiles/' . $image2Name;
        }

        // Upload Documents
        $save = $surveyHoarding->save();

        if ($save) {
            $response = ['status' => true, 'message' => 'Successfully Updated The Data'];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => 'Oops! Something Went Wrong'];
            return response($response, 200);
        }
    }
    // Update Survey Hoarding

    // update survey shop
    public function updateSurveyShop(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'areaName' => 'required',
            'landmark' => 'required',
            'address' => 'required',
            'owner' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'image1' => 'required',
            'image2' => 'required',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->first();
            $response = ['status' => false, 'message' => $error];
            return response($response, 200);
        }

        $shop = surveyShop::find($request->id);
        $tokenID = ['LoggedUserInfo' => surveyLogin::where('id', '=', session('LoggedUser'))->first()];
        $shop->AreaName = $request->areaName;
        $shop->Landmark = $request->landmark;
        $shop->Address = $request->address;
        $shop->Owner = $request->owner;
        $shop->Latitude = $request->latitude;
        $shop->Longitude = $request->longitude;
        $shop->UserID = $tokenID['LoggedUserInfo']['token'];

        // Upload Documents

        $image1 = $request->image1;
        if ($image1) {
            $image1Name = time() . '.' . $image1->getClientOriginalName();
            $request->image1->move('surveyFiles', $image1Name);
            $shop->Image1 = 'surveyFiles/' . $image1Name;
        }

        $image2 = $request->image2;
        if ($image2) {
            $image2Name = time() . '.' . $image2->getClientOriginalName();
            $request->image2->move('surveyFiles', $image2Name);
            $shop->Image2 = 'surveyFiles/' . $image2Name;
        }

        // Upload Documents

        $save = $shop->save();

        if ($save) {
            $response = ['status' => true, 'message' => 'Successfully Saved The Data'];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => 'Oops! Something Went Wrong'];
            return response($response, 200);
        }
    }
    // update survey shop
}
