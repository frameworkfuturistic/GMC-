<?php
/*
AdminController is the controller of Self Advertisement field
 */

namespace App\Http\Controllers;

use App\Repository\SelfAdvet\EloquentSelfAdvetRepository;
use App\Repository\SelfAdvet\SelfAdvetRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\AppHelper;
use Illuminate\Support\Facades\Config;

class AdminController extends Controller
{
    use AppHelper;
    protected $eloquentSelfAdvet;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $virtualRole = Config::get('constant-variable.VIRTUAL_ROLE');
            $user = auth()->user()->role_id ?? $virtualRole;            // variable -1 is for the users end
            $obj = new EloquentSelfAdvetRepository($user);
            $this->EloquentSelfAdvet = $obj;
            return $next($request);
        });
    }

    // User Interfaces Controller
    public function selfAdvet()
    {
        return $this->EloquentSelfAdvet->SelfAdvetView();
    }

    public function saveSelfAdvet(Request $request)
    {
        return $this->EloquentSelfAdvet->saveFiles($request);
    }

    public function updateSelfAdvet(Request $request)
    {
        return $this->EloquentSelfAdvet->updateFiles($request);
    }

    // Admin SelfAdvet Interface Controller
    public function SelfAdvetInbox()
    {
        return $this->EloquentSelfAdvet->SelfAdvetInboxView();
    }

    public function updateSelfAdvetInbox($id)
    {
        return $this->EloquentSelfAdvet->updateSelfAdvetInboxView($id);
    }

    public function SelfAdvetInboxWorkflow(Request $request)
    {
        //dd($request->all());
        return $this->EloquentSelfAdvet->AddSelfAdvetInboxWorkflow($request);
    }

    public function addComment(Request $request)
    {
        return $this->EloquentSelfAdvet->workflowTrack($request);
    }

    public function selfAdvetOutbox(Request $request)
    {
        return $this->EloquentSelfAdvet->SelfAdvetOutboxView($request);
    }

    public function updateSelfAdvetOutbox($id)
    {
        return $this->EloquentSelfAdvet->updateSelfAdvetOutboxView($id);
    }

    public function Payment()
    {
        return $this->EloquentSelfAdvet->paymentDash();
    }

    public function paymentDetails($id)
    {
        return $this->EloquentSelfAdvet->paymentDetailsView($id);
    }

    public function advetApproved(Request $request)
    {
        return $this->EloquentSelfAdvet->advetApprovedView($request);
    }

    public function updateAdvetApproved($id)
    {
        return $this->EloquentSelfAdvet->updateAdvetApprovedView($id);
    }

    public function advetRejected(Request $request)
    {
        return $this->EloquentSelfAdvet->advetRejectedView($request);
    }

    public function updateAdvetRejected($id)
    {
        return $this->EloquentSelfAdvet->updateAdvetRejectedView($id);
    }

    public function updatePmt(Request $request)
    {
        return $this->EloquentSelfAdvet->paymentUpdate($request);
    }
    // Admin SelfAdvet Interface Controller
    // User Interface Controller
}
