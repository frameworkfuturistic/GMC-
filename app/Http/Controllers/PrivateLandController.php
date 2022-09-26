<?php

namespace App\Http\Controllers;

use App\Repository\PrivateLand\EloquentPrivateLandRepository;
use Illuminate\Http\Request;
use App\Models\PrivateLand;
use Illuminate\Support\Facades\Config;

class PrivateLandController extends Controller
{


    protected $eloquentPrivateLand;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $virtualRole = Config::get('constant-variable.VIRTUAL_ROLE');
            $user = auth()->user()->role_id ?? $virtualRole;            // variable -1 is for the users end
            $obj = new EloquentPrivateLandRepository($user);
            $this->EloquentPrivateLand = $obj;
            return $next($request);
        });
    }

    function userView()
    {
        return $this->EloquentPrivateLand->view();
    }

    function savePrivateLand(Request $request)
    {
        return $this->EloquentPrivateLand->SavePrivateLand($request);
    }

    function LandAdvetInbox()
    {
        return $this->EloquentPrivateLand->PrivateLandAdvetInboxView();
    }

    function UpdateLandInbox($id)
    {
        return $this->EloquentPrivateLand->LandInboxUpdate($id);
    }

    function UpdateLand(Request $request)
    {
        return $this->EloquentPrivateLand->UpdatePrivateLand($request);
    }

    function PrivateLandWorkflow(Request $request)
    {
        return $this->EloquentPrivateLand->AddPrivateLandWorkflow($request);
    }

    function addComment(Request $request)
    {
        return $this->EloquentPrivateLand->workflowTrack($request);
    }
    // OUTBOX
    function LandAdvetOutbox(Request $request)
    {
        return $this->EloquentPrivateLand->PrivateLandOutboxView($request);
    }

    function updatePrivateLandOutbox($id)
    {
        return $this->EloquentPrivateLand->updatePrivateLandOutboxView($id);
    }
    // OUTBOX

    function landApproved(Request $request)
    {
        return $this->EloquentPrivateLand->landApprovedView($request);
    }

    function updateLandApproved($id)
    {
        return $this->EloquentPrivateLand->updateLandApprovedView($id);
    }

    function landRejected(Request $request)
    {
        return $this->EloquentPrivateLand->landRejectedView($request);
    }

    function updateLandRejected($id)
    {
        return $this->EloquentPrivateLand->updateLandRejectedView($id);
    }
}
