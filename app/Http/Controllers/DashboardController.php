<?php

namespace App\Http\Controllers;

use App\Traits\AppHelper as TraitAppHelper;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    use TraitAppHelper;
    protected $role_id;

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
        if (auth()->user()->user_type == 1) {
            return view('admin.agencyDash.dashboard');
        } else {

            return view('admin.index', ['parents' => $this->parent], ['childs' => $this->child]);
        }
    }
}
