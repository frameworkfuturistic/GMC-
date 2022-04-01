<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\surveyLogin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class SurveyController extends Controller
{
    function login(){
        return view('hoardingSurvey.login');
    }

    function register(){
        return view('hoardingSurvey.register');
    }

    function save(Request $request){
        //dd($request->all());

        // validate requests
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required|email|unique:survey_logins',
            'password'=>'required|min:5'
        ]);

        if ($validator->fails())
            {
                $error = $validator->errors()->first();
                $response = ['status' => false, 'message' => $error];
                return response($response, 200);
            }

        $user=new surveyLogin;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $token=Str::random(80);
        $user->token=$token;
        $save=$user->save();

        if($save){
            return back()->with('success','Please Login to Continue');
        }
        else{
            return back()->with('fail','Something went wrong, try again later');
        }
    }

    function checkLogin(Request $request){
        //dd($request->all());

        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:15'
        ]);

        $userinfo= surveyLogin::where('email','=',$request->email)->first();
        if(!$userinfo){
            return back()->with('fail','We do not recognize your email address');
        }
        else{
            if(Hash::check($request->password,$userinfo->password)){
                return $userinfo->token;
            }
            else{
                return back()->with('fail','Incorrect Password');
            }
        }
    }

    function AddSurveyHoarding(Request $request){
        
    }

}
