<?php
/*
    AdminController is the controller of Self Advertisement field
*/
namespace App\Http\Controllers;
use App\Models\VehicleAdvertisement;
use App\Models\PrivateLand;
use App\Models\BanquetHall;
use App\Models\Hostel;
use App\Models\Dharmasala;
use App\Models\ParamString;
use App\Models\WorkflowCandidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    use Traits\SelfAdvet;

    // User Interfaces Controller
    function selfAdvet(){
        return $this->SelfAdvetView();
    }
    function saveSelfAdvet(Request $request){
        return $this->saveFiles($request);
    }

    function updateSelfAdvet(Request $request){
        return $this->updateFiles($request);
    }

    // Admin SelfAdvet Interface Controller
    function SelfAdvetInbox(){
        return $this->SelfAdvetInboxView();
    }

    function updateSelfAdvetInbox($id){
        return $this->updateSelfAdvetInboxView($id);
    }

    function SelfAdvetInboxWorkflow(Request $request){
        //dd($request->all());
        return $this->AddSelfAdvetInboxWorkflow($request);
    }

    function addComment(Request $request){
        return $this->workflowTrack($request);
    }

    function selfAdvetOutbox(){
        return $this->SelfAdvetOutboxView();
    }

    function updateSelfAdvetOutbox($id){
        return $this->updateSelfAdvetOutboxView($id);
    }

    function Payment(){
        return $this->paymentDash();
    }

    function paymentDetails($id){
        return $this->paymentDetailsView($id);
    }

    function advetApproved(){
        return $this->advetApprovedView();
    }

    function updateAdvetApproved($id){
        return $this->updateAdvetApprovedView($id);
    }

    function advetRejected(){
        return $this->advetRejectedView();
    }

    function updateAdvetRejected($id){
        return $this->updateAdvetRejectedView($id);
    }

    function updatePmt(Request $request){
        return $this->paymentUpdate($request);
    }
    // Admin SelfAdvet Interface Controller
    // User Interface Controller
}
