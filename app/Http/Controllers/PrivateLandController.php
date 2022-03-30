<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrivateLand;

class PrivateLandController extends Controller
{
    use Traits\PrivateLands;

    function userView(){
        return $this->view();
    }

    function savePrivateLand(Request $request){
       return $this->SavePrivateLand($request);
    }

    function LandAdvetInbox(){
        return $this->PrivateLandAdvetInboxView();
    }

    function UpdateLandInbox($id){
        return $this->LandInboxUpdate($id);
    }

    function UpdateLand(Request $request){
        return $this->UpdatePrivateLand($request);
    }

    function PrivateLandWorkflow(Request $request){
        return $this->AddPrivateLandWorkflow($request);
    }

    function addComment(Request $request){
        return $this->workflowTrack($request);
    }
    // OUTBOX
    function LandAdvetOutbox(){
        return $this->PrivateLandOutboxView();
    }

    function updatePrivateLandOutbox($id){
        return $this->updatePrivateLandOutboxView($id);
    }
    // OUTBOX

    function landApproved(){
        return $this->landApprovedView();
    }

    function updateLandApproved($id){
        return $this->updateLandApprovedView($id);
    }

    function landRejected(){
        return $this->landRejectedView();
    }

    function updateLandRejected($id){
        return $this->updateLandRejectedView($id);
    }
}
