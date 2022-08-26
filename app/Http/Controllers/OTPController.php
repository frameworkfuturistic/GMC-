<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OtpMaster;

class OTPController extends Controller
{
    function generate(Request $request)
    {
        // dd($request->all());
        $num = $request->mobile;
        $otp = mt_rand(1000, 9999);

        $check_mob = OtpMaster::where('mobile_no', '=', $num)->first();
        if ($check_mob) {
            $check_mob->otp = $otp;
            $check_mob->save();
            return $otp;
        }
        $mobile = new OtpMaster();
        $mobile->mobile_no = $num;
        $mobile->otp = $otp;
        $mobile->save();
        return $otp;
    }

    public function authenticateOtp(Request $request)
    {
        if ($request->mobile1 == null) {
            return back()->with('status', 'Incorrect OTP');
        }
        $mobile = OtpMaster::where('mobile_no', $request->mobile1)->first();
        if ($mobile->otp == $request->otp) {
            $request->session()->put('mobile', $request->mobile1);
            $value = session('mobile');
            return redirect("$request->link");
        } else
            return back()->with('status', 'Incorrect OTP');
    }
}
