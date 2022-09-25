<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Traits\AppHelper;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use AppHelper;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user_info = Auth::user()->role_id; // returns user
            $this->menuApp($this->user_info);
            return $next($request);
        });
    }
    public function index()
    {
        $array = [
            'parents' => $this->parent,
            'childs' => $this->child
        ];
        return view('admin.add-users')->with($array);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $rules = array(
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        );

        $validator = Validator::make($request->input(), $rules);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors());
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_type = $request->userType;
        $user->password = Hash::make($request->pass);
        $user->save();
        return back()->with('success', 'Successfully added the User');
    }
}
