<?php

namespace App\Http\Controllers;

use App\Traits\AppHelper as TraitAppHelper;

class DashboardController extends Controller
{
    use TraitAppHelper;

    public function __construct()
    {
        $this->menuApp();
    }
    
    public function index(){
        if(auth()->user()->user_type==1){
            return view('admin.agencyDash.dashboard');
        }
        else{
            
            return view('admin.index',['parents'=>$this->parent],['childs'=>$this->child]);
        }
    }
}