<?php

namespace App\Http\Controllers;

use App\Repository\PrivateLand\EloquentPrivateLandRepository;
use Illuminate\Http\Request;
use App\Models\PrivateLand;

class PrivateLandController extends Controller
{


    protected $eloquentPrivateLand;

    public function __construct(EloquentPrivateLandRepository $eloquentPrivateLand)
    {
        $this->EloquentPrivateLand = $eloquentPrivateLand;
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

    function landApproved()
    {
        return $this->EloquentPrivateLand->landApprovedView();
    }

    function updateLandApproved($id)
    {
        return $this->EloquentPrivateLand->updateLandApprovedView($id);
    }

    function landRejected()
    {
        return $this->EloquentPrivateLand->landRejectedView();
    }

    function updateLandRejected($id)
    {
        return $this->EloquentPrivateLand->updateLandRejectedView($id);
    }
}
