<?php

namespace App\Http\Controllers;

use App\Repository\NoticesTcs\NoticeTcRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class NoticeAndTcController extends Controller
{
    /**
     * | Created On-04-12-2022 
     * | Created For-Illigal Notice Generation and TC Status
     * | Created By-Anshu Kumar
     */

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $virtualRole = Config::get('constant-variable.VIRTUAL_ROLE');
            $user = auth()->user()->role_id ?? $virtualRole;                 // Virtual Role is for the User End
            $obj = new NoticeTcRepo($user);
            $this->Repository = $obj;
            return $next($request);
        });
    }

    // View for Illigal Notice Index
    public function indexNotice()
    {
        return $this->Repository->indexNotice();
    }

    // Generate Notice
    public function generateNotice(Request $req)
    {
        return $this->Repository->generateNotice($req);
    }

    // See TC Details
    public function knowYourTc()
    {
        return $this->Repository->knowYourTc();
    }
}
