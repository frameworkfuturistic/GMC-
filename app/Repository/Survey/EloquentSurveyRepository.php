<?php

namespace App\Repository\Survey;

use App\Models\Param;
use App\Models\ParamString;
use App\Models\surveyHoarding;
use App\Models\surveyLogin;
use App\Models\SurveySeptic;
use App\Models\surveyShop;
use App\Notifications\EmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

/**
 *| @desc-Repository for Survey Users Login Authentications and Much thing
 *| Created By-Anshu Kumar
 *| Created On-28-07-2022
 *|-------------------------------------------------------------------------------------
 */
class EloquentSurveyRepository implements SurveyRepository
{
    /**
     *| function for Add Survey Users
     *| @param Request $request
     *| @return Token for API Calls
     *| @return redirect for Web Calls
     */
    public function saveSurveyUser(Request $request)
    {
        //dd($request->all());
        $allowUser = Param::select('AllowCreateUser')
            ->get()->first();
        //return $allowUser;
        // validate requests
        if ($allowUser->AllowCreateUser == true) {
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
            $user->mobile = $request->mobile;
            $user->designation = $request->designation;
            $user->gender = $request->gender;
            $user->dob = $request->dob;
            $user->offer_letter = $request->offer_letter;
            $user->joining = $request->joining;
            $user->email = $request->email;
            $user->photo = $request->photo;
            $user->password = Hash::make($request->password);
            $token = Str::random(80);
            // $token = $user->createToken('my-app-token')->plainTextToken;
            $user->token = $token;
            $save = $user->save();

            if ($save) {
                $response = ['status' => true, 'message' => 'Please Login to Continue'];
                return response($response, 200);
            } else {
                $response = ['status' => false, 'message' => 'Something went wrong, try again later'];
                return response($response, 500);
            }
        } else {
            $response = ['status' => false, 'message' => 'UnAuthorized'];
            return response($response, 401);
        }
    }

    /**
     *| function for login authentication for users and generating token
     *| @param Request $request
     *| @return Response
     */
    public function checkLogin(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:25',
        ]);

        $userinfo = surveyLogin::where('email', '=', $request->email)->first();
        if (!$userinfo) {
            $response = ['status' => false, 'message' => 'Oops! Given email does not exist'];
            return response($response, 401);
        } else {
            if (Hash::check($request->password, $userinfo->password)) {
                $token = $userinfo->createToken('my-app-token')->plainTextToken;
                $userinfo->token = $token;
                $userinfo->save();

                $response = ['status' => true, 'token' => $token];
                return response($response, 200);
            } else {
                $response = ['status' => false, 'message' => 'Incorrect Password'];
                return response($response, 401);
            }
        }
    }

    /**
     * | @desc Forget Password
     * | @param Request $request
     * | @return Response
     *
     */
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

    /**
     * | Get Circle List
     * | @return response
     */
    public function getCircleList()
    {
        $circle = ParamString::where('ParamCategoryID', '=', '3001')->get(); //PARAM CATEGORY ID FOR CIRCLE (3001)
        $arr = array();
        foreach ($circle as $circles) {
            $val['circle'] = $circles->StringParameter;
            array_push($arr, $val);
        }

        $response = [
            'status' => true,
            'message' => 'Data Fetched',
            'data' => $arr,
        ];

        return response($response, 200);
    }

    public function getBuildingType()
    {
        $building = ParamString::where('ParamCategoryID', '=', '3002')->get(); //Param Category ID FOR BUILDING TYPE (3002)
        $arr = array();
        foreach ($building as $buildings) {
            $val['building'] = $buildings->StringParameter;
            array_push($arr, $val);
        }

        $response = [
            'status' => true,
            'message' => 'Data Fetched',
            'data' => $arr,
        ];

        return response($response, 200);
    }

    public function getFloor()
    {
        $floor = ParamString::where('ParamCategoryID', '=', '3003')->get(); // PARAM CATEOGY ID FOR FLOOR (3003)
        $arr = array();
        foreach ($floor as $floors) {
            $val['Floor'] = $floors->StringParameter;
            array_push($arr, $val);
        }

        $response = [
            'status' => true,
            'message' => 'Data Fetched',
            'data' => $arr,
        ];

        return response($response, 200);
    }

    public function getHoardingTypes()
    {
        $floor = ParamString::where('ParamCategoryID', '=', '3004')->get(); // PARAM CATEOGY ID FOR FLOOR (3003)
        $arr = array();
        foreach ($floor as $floors) {
            $val['hoardingType'] = $floors->StringParameter;
            array_push($arr, $val);
        }

        $response = [
            'status' => true,
            'message' => 'Data Fetched',
            'data' => $arr,
        ];

        return response($response, 200);
    }

    //HOARDING SURVEY
    public function AddSurveyHoarding(Request $request)
    {
        if ($request->bearerToken() == false) {
            return response()->json([
                'status' => false,
                'message' => 'No Bearer Token',
            ], 400);
        } else {
            // dd($request->all());
            // Validation
            $validator = Validator::make($request->all(), [
                'hoardingLocation' => 'required',
                'longitude' => 'required',
                'latitude' => 'required',
                'length' => 'required',
                'width' => 'required',
                'hoardingType' => 'required',
            ]);

            if ($validator->fails()) {
                $error = $validator->errors()->first();
                $response = ['status' => false, 'message' => $error];
                return response($response, 200);
            }
            // $tokenID = ['LoggedUserInfo' => surveyLogin::where('id', '=', session('LoggedUser'))->first()];

            $surveyHoarding = new surveyHoarding;
            $surveyHoarding->hoardingType = $request->hoardingType;
            $surveyHoarding->HoardingCode = $request->hoardingCode;
            $surveyHoarding->HoldingNo = $request->holdingNo;
            $surveyHoarding->Content = $request->content;
            $surveyHoarding->Agency = $request->agency;
            $surveyHoarding->Location = $request->location;
            $surveyHoarding->Longitude = $request->longitude;
            $surveyHoarding->Latitude = $request->latitude;
            $surveyHoarding->Length = $request->hoardingLength;
            $surveyHoarding->Width = $request->width;
            $surveyHoarding->UserID = auth()->user()->id;

            // Upload Documents

            $png_url = "shopimg1-" . time() . ".png";
            $path = public_path() . "/surveyFiles/" . $png_url;
            $img = $request->image1;
            $data = base64_decode($img);
            $success = file_put_contents($path, $data);
            $surveyHoarding->Image1 = 'surveyFiles/' . $png_url;

            $png_url = "shopimg2-" . time() . ".png";
            $path = public_path() . "/surveyFiles/" . $png_url;
            $img = $request->image2;
            $data = base64_decode($img);
            $success = file_put_contents($path, $data);
            $surveyHoarding->Image2 = 'surveyFiles/' . $png_url;

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
    }

    public function getSurveyHoarding(Request $request)
    {
        if ($request->bearerToken() == false) {
            return response()->json([
                'status' => false,
                'message' => 'No Bearer Token',
            ], 400);
        } else {
            $data = SurveyHoarding::where('UserID', '=', auth()->user()->id)
                ->orderBy('id', 'Desc')
                ->paginate(20);

            $arr = array();
            foreach ($data as $datas) {
                $val['id'] = $datas->id ?? '';

                $val['hoardingType'] = $datas->hoardingType ?? '';
                $val['HoardingCode'] = $datas->HoardingCode ?? '';
                $val['Content'] = $datas->Content ?? '';
                $val['Agency'] = $datas->Agency ?? '';
                $val['Location'] = $datas->Location ?? '';
                $val['Longitude'] = $datas->Longitude ?? '';
                $val['Latitude'] = $datas->Latitude ?? '';
                $val['Length'] = $datas->Length ?? '';
                $val['Width'] = $datas->Width ?? '';
                $val['Image1'] = url('/') . '/' . $datas->Image1 ?? '';
                $val['Image2'] = url('/') . '/' . $datas->Image2 ?? '';
                array_push($arr, $val);
            }

            $response = [
                'status' => true,
                'message' => 'Data Fetched',
                'data' => $arr,
            ];

            return response($response, 200);
        }
    }

    public function getSurveyHoardingByID(Request $request)
    {
        $data = SurveyHoarding::where('id', '=', $request->id)
            ->get();
        $arr = array();
        foreach ($data as $datas) {
            $val['id'] = $datas->id ?? '';

            $val['hoardingType'] = $datas->hoardingType ?? '';
            $val['HoardingCode'] = $datas->HoardingCode ?? '';
            $val['Content'] = $datas->Content ?? '';
            $val['Agency'] = $datas->Agency ?? '';
            $val['Location'] = $datas->Location ?? '';
            $val['Longitude'] = $datas->Longitude ?? '';
            $val['Latitude'] = $datas->Latitude ?? '';
            $val['Length'] = $datas->Length ?? '';
            $val['Width'] = $datas->Width ?? '';
            $val['Image1'] = url('/') . '/' . $datas->Image1 ?? '';
            $val['Image2'] = url('/') . '/' . $datas->Image2 ?? '';
            array_push($arr, $val);
        }

        $response = [
            'status' => true,
            'message' => 'Data Fetched',
            'data' => $arr,
        ];

        return response($response, 200);
    }

    public function getAllSurveyHoarding()
    {
        $data = SurveyHoarding::orderBy('id', 'Desc')
            ->paginate(20);
        $arr = array();
        foreach ($data as $datas) {
            $val['id'] = $datas->id ?? '';

            $val['hoardingType'] = $datas->hoardingType ?? '';
            $val['HoardingCode'] = $datas->HoardingCode ?? '';
            $val['Content'] = $datas->Content ?? '';
            $val['Agency'] = $datas->Agency ?? '';
            $val['Location'] = $datas->Location ?? '';
            $val['Longitude'] = $datas->Longitude ?? '';
            $val['Latitude'] = $datas->Latitude ?? '';
            $val['Length'] = $datas->Length ?? '';
            $val['Width'] = $datas->Width ?? '';
            $val['Image1'] = url('/') . '/' . $datas->Image1 ?? '';
            $val['Image2'] = url('/') . '/' . $datas->Image2 ?? '';

            array_push($arr, $val);
        }

        $response = [
            'status' => true,
            'message' => 'Data Fetched',
            'data' => $arr,
        ];

        return response($response, 200);
    }

    public function updateSurveyHoarding(Request $request)
    {

        //dd($request->all());
        // Validation
        $validator = Validator::make($request->all(), [
            'id' => 'required',
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
        // $tokenID = ['LoggedUserInfo' => surveyLogin::where('id', '=', session('LoggedUser'))->first()];

        $surveyHoarding->hoardingLocation = $request->hoardingLocation;
        $surveyHoarding->Longitude = $request->longitude;
        $surveyHoarding->Latitude = $request->latitude;
        $surveyHoarding->Length = $request->length;
        $surveyHoarding->Width = $request->width;
        $surveyHoarding->hoardingType = $request->hoardingType;
        $surveyHoarding->UserID = auth()->user()->id;
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

    //SHOP SURVEY
    public function addSurveyShop(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'circle' => 'required',
            'interviewee' => 'required',
            'relation' => 'required',
            'licenseeName' => 'required',
            // 'licenseeFather' => 'required',
            'address' => 'required',
            'locality' => 'required',
            // 'allotmentNo' => 'required',
            'shopName' => 'required',
            // 'shopNo' => 'required',
            // 'plotNo' => 'required',
            // 'holdingNo' => 'required',
            'buildingType' => 'required',
            'floor' => 'required',
            'areaName' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            // 'email' => 'required|email',
            // 'gst' => 'required|min:15|max:15',
            'image1' => 'required',
            'image2' => 'required',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->first();
            $response = ['status' => false, 'message' => $error];
            return response($response, 200);
        }

        $shop = new surveyShop;
        $shop->Circle = $request->circle;
        $shop->Interviewee = $request->interviewee;
        $shop->Relation = $request->relation;
        $shop->LicenseeName = $request->licenseeName;
        $shop->LicenseeFather = $request->licenseeFather;
        $shop->Address = $request->address;
        $shop->Locality = $request->locality;
        $shop->AllotmentNo = $request->allotmentNo;
        // $shop->AllotmentDate = $request->allotmentDate;
        $shop->ShopName = $request->shopName;
        $shop->ShopNo = $request->shopNo;
        $shop->PlotNo = $request->plotNo;
        $shop->HoldingNo = $request->holdingNo;
        $shop->BuildingType = $request->buildingType;
        $shop->Floor = $request->floor;
        $shop->AreaName = $request->areaName;
        $shop->Latitude = $request->latitude;
        $shop->Longitude = $request->longitude;
        $shop->Email = $request->email;
        $shop->GST = $request->gst;
        $shop->Mobile = $request->mobile;

        $shop->UserID = auth()->user()->id;

        // Upload Documents

        // $image1 = $request->image1;
        // if ($image1) {
        //     $image1Name = time() . 'image1.jgp' ;//. $image1->getClientOriginalName();
        //     $request->image1->move('surveyFiles', $image1Name);
        //     $shop->Image1 = 'surveyFiles/' . $image1Name;
        // }

        $png_url = "shopimg1-" . time() . ".png";
        $path = public_path() . "/surveyFiles/" . $png_url;
        $img = $request->image1;
        $data = base64_decode($img);
        $success = file_put_contents($path, $data);
        $shop->Image1 = 'surveyFiles/' . $png_url;

        $png_url = "shopimg2-" . time() . ".png";
        $path = public_path() . "/surveyFiles/" . $png_url;
        $img = $request->image2;
        $data = base64_decode($img);
        $success = file_put_contents($path, $data);
        $shop->Image2 = 'surveyFiles/' . $png_url;

        // $folderPath = "surveyFiles/";
        // $base64Image = explode(";base64,", $request->image1);
        // $explodeImage = explode("image/", $base64Image[0]);
        // $imageType = $explodeImage[1];
        // $image_base64 = base64_decode($base64Image[1]);
        // $file = $folderPath . uniqid() . '. '.$imageType;

        // file_put_contents($file, $image_base64);

        // $image2 = $request->image2;
        // if ($image2) {
        //     $image2Name = time() . 'image2.jpg'; // . $image2->getClientOriginalName();
        //     $request->image2->move('surveyFiles', $image2Name);
        //     $shop->Image2 = 'surveyFiles/' . $image2Name;
        // }

        // Upload Documents

        $save = $shop->save();

        if ($save) {
            $response = ['status' => true, 'message' => 'Successfully Saved The Data'];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => 'Oops! Something Went Wrong'];
            return response($response, 400);
        }
    }

    public function getSurveyShop()
    {
        //$tokenID = ['LoggedUserInfo' => surveyLogin::where('id', '=', session('LoggedUser'))->first()];
        $data = surveyShop::where('UserID', '=', auth()->user()->id)
            ->orderBy('id', 'Desc')
            ->paginate(20);

        $arr = array();
        foreach ($data as $datas) {
            $val['id'] = $datas->id;
            $val['Circle'] = $datas->Circle;
            $val['Interviewee'] = $datas->Interviewee ?? '';
            $val['Relation'] = $datas->Relation ?? '';
            $val['LicenseeName'] = $datas->LicenseeName ?? '';
            $val['LicenseeFather'] = $datas->LicenseeFather ?? '';
            $val['Address'] = $datas->Address ?? '';
            $val['Locality'] = $datas->Locality ?? '';
            $val['AllotmentNo'] = $datas->AllotmentNo ?? '';
            $val['AllotmentDate'] = $datas->AllotmentDate ?? '';
            $val['ShopName'] = $datas->ShopName ?? '';
            $val['ShopNo'] = $datas->ShopNo ?? '';
            $val['PlotNo'] = $datas->PlotNo ?? '';
            $val['HoldingNo'] = $datas->HoldingNo ?? '';
            $val['BuildingType'] = $datas->BuildingType ?? '';
            $val['Floor'] = $datas->Floor ?? '';
            $val['AreaName'] = $datas->AreaName ?? '';
            $val['Latitude'] = $datas->Latitude ?? '';
            $val['Longitude'] = $datas->Longitude ?? '';
            $val['Email'] = $datas->Email ?? '';
            $val['GST'] = $datas->GST ?? '';
            $val['Image1'] = url('/') . '/' . $datas->Image1 ?? '';
            $val['Image2'] = url('/') . '/' . $datas->Image2 ?? '';
            $val['UserID'] = $datas->UserID ?? '';
            array_push($arr, $val);
        }
        $response = [
            'status' => true,
            'message' => 'Data Fetched',
            'data' => $arr,
        ];

        return response($response, 200);
    }

    public function getSurveyShopByID(Request $request)
    {
        $data = surveyShop::where('id', '=', $request->id)
            ->get();
        $arr = array();
        foreach ($data as $datas) {
            $val['id'] = $datas->id;
            $val['Circle'] = $datas->Circle;
            $val['Interviewee'] = $datas->Interviewee ?? '';
            $val['Relation'] = $datas->Relation ?? '';
            $val['LicenseeName'] = $datas->LicenseeName ?? '';
            $val['LicenseeFather'] = $datas->LicenseeFather ?? '';
            $val['Address'] = $datas->Address ?? '';
            $val['Locality'] = $datas->Locality ?? '';
            $val['AllotmentNo'] = $datas->AllotmentNo ?? '';
            $val['AllotmentDate'] = $datas->AllotmentDate ?? '';
            $val['ShopName'] = $datas->ShopName ?? '';
            $val['ShopNo'] = $datas->ShopNo ?? '';
            $val['PlotNo'] = $datas->PlotNo ?? '';
            $val['HoldingNo'] = $datas->HoldingNo ?? '';
            $val['BuildingType'] = $datas->BuildingType ?? '';
            $val['Floor'] = $datas->Floor ?? '';
            $val['AreaName'] = $datas->AreaName ?? '';
            $val['Latitude'] = $datas->Latitude ?? '';
            $val['Longitude'] = $datas->Longitude ?? '';
            $val['Email'] = $datas->Email ?? '';
            $val['GST'] = $datas->GST ?? '';
            $val['Image1'] = url('/') . '/' . $datas->Image1 ?? '';
            $val['Image2'] = url('/') . '/' . $datas->Image2 ?? '';
            $val['UserID'] = $datas->UserID ?? '';
            array_push($arr, $val);
        }
        $response = [
            'status' => true,
            'message' => 'Data Fetched',
            'data' => $arr,
        ];

        return response($response, 200);
    }

    public function getAllSurveyShop()
    {
        $data = surveyShop::orderBy('id', 'Desc')
            ->paginate(20);
        $arr = array();
        foreach ($data as $datas) {
            $val['id'] = $datas->id;
            $val['Circle'] = $datas->Circle;
            $val['Interviewee'] = $datas->Interviewee ?? '';
            $val['Relation'] = $datas->Relation ?? '';
            $val['LicenseeName'] = $datas->LicenseeName ?? '';
            $val['LicenseeFather'] = $datas->LicenseeFather ?? '';
            $val['Address'] = $datas->Address ?? '';
            $val['Locality'] = $datas->Locality ?? '';
            $val['AllotmentNo'] = $datas->AllotmentNo ?? '';
            $val['AllotmentDate'] = $datas->AllotmentDate ?? '';
            $val['ShopName'] = $datas->ShopName ?? '';
            $val['ShopNo'] = $datas->ShopNo ?? '';
            $val['PlotNo'] = $datas->PlotNo ?? '';
            $val['HoldingNo'] = $datas->HoldingNo ?? '';
            $val['BuildingType'] = $datas->BuildingType ?? '';
            $val['Floor'] = $datas->Floor ?? '';
            $val['AreaName'] = $datas->AreaName ?? '';
            $val['Latitude'] = $datas->Latitude ?? '';
            $val['Longitude'] = $datas->Longitude ?? '';
            $val['Email'] = $datas->Email ?? '';
            $val['GST'] = $datas->GST ?? '';
            $val['Image1'] = url('/') . '/' . $datas->Image1 ?? '';
            $val['Image2'] = url('/') . '/' . $datas->Image2 ?? '';
            $val['UserID'] = $datas->UserID ?? '';
            array_push($arr, $val);
        }
        $response = [
            'status' => true,
            'message' => 'Data Fetched',
            'data' => $arr,
        ];

        return response($response, 200);
    }

    public function updateSurveyShop(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'circle' => 'required',
            'interviewee' => 'required',
            'relation' => 'required',
            'licenseeName' => 'required',
            'licenseeFather' => 'required',
            'address' => 'required',
            'locality' => 'required',
            'allotmentNo' => 'required',
            'allotmentDate' => 'required',
            'shopName' => 'required',
            'shopNo' => 'required',
            'plotNo' => 'required',
            'holdingNo' => 'required',
            'buildingType' => 'required',
            'floor' => 'required',
            'areaName' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'email' => 'required|email',
            'gst' => 'required|min:15|max:15',
            'image1' => 'required',
            'image2' => 'required',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->first();
            $response = ['status' => false, 'message' => $error];
            return response($response, 200);
        }

        $shop = surveyShop::find($request->id);
        $shop->Circle = $request->circle;
        $shop->Interviewee = $request->interviewee;
        $shop->Relation = $request->relation;
        $shop->LicenseeName = $request->licenseeName;
        $shop->LicenseeFather = $request->licenseeFather;
        $shop->Address = $request->address;
        $shop->Locality = $request->locality;
        $shop->AllotmentNo = $request->allotmentNo;
        $shop->AllotmentDate = $request->allotmentDate;
        $shop->ShopName = $request->shopName;
        $shop->ShopNo = $request->shopNo;
        $shop->PlotNo = $request->plotNo;
        $shop->HoldingNo = $request->holdingNo;
        $shop->BuildingType = $request->buildingType;
        $shop->Floor = $request->floor;
        $shop->AreaName = $request->areaName;
        $shop->Latitude = $request->latitude;
        $shop->Longitude = $request->longitude;
        $shop->Email = $request->email;
        $shop->GST = $request->gst;

        $shop->UserID = auth()->user()->id;

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
            $response = ['status' => true, 'message' => 'Successfully Updated The Data'];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => 'Oops! Something Went Wrong'];
            return response($response, 200);
        }
    }

    //SEPTIC LATRINE
    public function addSurveySepticLatrine(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'houseOwner' => 'required',
            'address' => 'required',
            'locality' => 'required',
            'address' => 'required',
            'locality' => 'required',
            'interviewee' => 'required',
            'capacity' => 'required',
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

        $septic = new SurveySeptic();
        $septic->HouseOwner = $request->houseOwner;
        $septic->HoldingNo = $request->holdingNo;
        $septic->Mobile = $request->mobile;
        $septic->Address = $request->address;
        $septic->Locality = $request->locality;
        $septic->Interviewee = $request->interviewee;
        $septic->Relation = $request->relation;
        $septic->Latitude = $request->latitude;
        $septic->Longitude = $request->longitude;
        $septic->Length = $request->length;
        $septic->Width = $request->width;
        $septic->Capacity = $request->capacity;
        $septic->UserID = auth()->user()->id;

        $png_url = "shopimg1-" . time() . ".png";
        $path = public_path() . "/surveyFiles/" . $png_url;
        $img = $request->image1;
        $data = base64_decode($img);
        $success = file_put_contents($path, $data);
        $septic->Image1 = 'surveyFiles/' . $png_url;

        $png_url = "shopimg2-" . time() . ".png";
        $path = public_path() . "/surveyFiles/" . $png_url;
        $img = $request->image2;
        $data = base64_decode($img);
        $success = file_put_contents($path, $data);
        $septic->Image2 = 'surveyFiles/' . $png_url;

        $save = $septic->save();

        if ($save) {
            $response = ['status' => true, 'message' => 'Successfully Saved The Data'];
            return response($response, 200);
        } else {
            $response = ['status' => false, 'message' => 'Oops! Something Went Wrong'];
            return response($response, 400);
        }
    }

    public function getSurveySepticLatrine()
    {
        //$tokenID = ['LoggedUserInfo' => surveyLogin::where('id', '=', session('LoggedUser'))->first()];
        $data = SurveySeptic::where('UserID', '=', auth()->user()->id)
            ->orderBy('id', 'Desc')
            ->paginate(20);

        $arr = array();
        foreach ($data as $datas) {
            $val['id'] = $datas->id;
            $val['HouseOwner'] = $datas->Circle;
            $val['HoldingNo'] = $datas->Interviewee ?? '';
            $val['Mobile'] = $datas->Relation ?? '';
            $val['Address'] = $datas->LicenseeName ?? '';
            $val['Locality'] = $datas->LicenseeFather ?? '';
            $val['Interviewee'] = $datas->Address ?? '';
            $val['Relation'] = $datas->Locality ?? '';
            $val['Longitude'] = $datas->AllotmentNo ?? '';
            $val['Latitude'] = $datas->AllotmentDate ?? '';
            $val['Length'] = $datas->ShopName ?? '';
            $val['Width'] = $datas->ShopNo ?? '';
            $val['Capacity'] = $datas->PlotNo ?? '';
            $val['Image1'] = url('/') . '/' . $datas->Image1 ?? '';
            $val['Image2'] = url('/') . '/' . $datas->Image2 ?? '';
            $val['UserID'] = $datas->UserID ?? '';
            array_push($arr, $val);
        }
        $response = [
            'status' => true,
            'message' => 'Data Fetched',
            'data' => $arr,
        ];

        return response($response, 200);
    }
}
