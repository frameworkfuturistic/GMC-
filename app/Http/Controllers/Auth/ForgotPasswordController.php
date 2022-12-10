<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendCodeResetPassword;
use App\Models\ResetCodePassword;
use App\Models\surveyLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    //
    public function __invoke(Request $req)
    {
        $data = $req->validate([
            'email' => 'required|email'
        ]);

        // Delete all old code that user and before
        ResetCodePassword::where('email', $req->email)->delete();

        // Generate Random code
        $data['code'] =  Str::random(64);

        // Create New Code
        $codeData = ResetCodePassword::create($data);

        // Mail Send To User
        Mail::to($req->email)->send(new SendCodeResetPassword($codeData->code));
        return response(['message' => trans('passwords.sent')], 200);
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.forgetPasswordLink', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('reset_code_passwords')
            ->where([
                'email' => $request->email,
                'code' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return "Token Expired";
        }

        $user = surveyLogin::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('reset_code_passwords')->where(['email' => $request->email])->delete();
        return "Your Password has Been Changed Successfully";
    }
}
