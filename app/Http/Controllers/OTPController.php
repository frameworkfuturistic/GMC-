<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Nexmo\Laravel\Facade\Nexmo;

class OTPController extends Controller
{
    function generate(Request $request){
        //dd($request->all());
        $num=$request->input('mobile');
        $otp=mt_rand(1000,9999);

        Nexmo::message()->send([
            'to'=>'91'.$num,
            'from'=>'916201675668',
            'text'=>'Your OTP is' .$otp. 'for Verification'
        ]);
        echo 'success','Message Sent';
    }
}
