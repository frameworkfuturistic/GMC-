<?php

namespace App\Http\Controllers;

use App\Models\VehicleAdvertisement;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    use Traits\VehicleAdvet;

    function userView(){
        return $this->view();
    }

    function saveVehicleAdvet(Request $request){
        return $this->saveVehicle($request);
    }

    // INBOX
    function vehicleInbox(){
        return $this->vehicleInboxView();
    }

    function udpateVehicleInbox($id){
        return $this->vehicleInboxUpdate($id);
    }

    function UpdateVehicle(Request $request){
         return $this->UpdateVehicleInbox($request);
    }   

    function vehicleWorkflow(Request $request){
        return $this->addVehicleWorkflow($request);
    }

    function addComment(Request $request){
        return $this->workflowTrack($request);
    }
    
    // INBOX

    // OUTBOX
    function vehicleOutbox(){
        return $this->vehicleOutboxView();
    }

    function updateVehicleOutbox($id){
        return $this->updateVehicleOutboxView($id);
        
    }
    // OUTBOX

    function vehicleApproved(){
        return $this->vehicleApprovedView();
    }

    function updateVehicleApproved($id){
        return $this->updateVehicleApprovedView($id);
    }

    function vehicleRejected(){
        return $this->vehicleRejectedView();
    }

    function updateVehicleRejected($id){
        return $this->updateVehicleRejectedView($id);
    }
}
