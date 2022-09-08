<?php

namespace App\Http\Controllers;

use App\Repository\Vehicle\EloquentVehicleRepository;
use Illuminate\Http\Request;

class VehicleController extends Controller
{

    public function __construct(EloquentVehicleRepository $eloquentVehicle)
    {
        $this->EloquentVehicle = $eloquentVehicle;
    }

    public function userView()
    {
        return $this->EloquentVehicle->view();
    }

    public function saveVehicleAdvet(Request $request)
    {
        return $this->EloquentVehicle->saveVehicle($request);
    }

    // INBOX
    public function vehicleInbox()
    {
        return $this->EloquentVehicle->vehicleInboxView();
    }

    public function udpateVehicleInbox($id)
    {
        return $this->EloquentVehicle->vehicleInboxUpdate($id);
    }

    public function UpdateVehicle(Request $request)
    {
        return $this->EloquentVehicle->UpdateVehicleInbox($request);
    }

    public function vehicleWorkflow(Request $request)
    {
        return $this->EloquentVehicle->addVehicleWorkflow($request);
    }

    public function addComment(Request $request)
    {
        return $this->EloquentVehicle->workflowTrack($request);
    }

    // INBOX

    // OUTBOX
    public function vehicleOutbox(Request $request)
    {
        return $this->EloquentVehicle->vehicleOutboxView($request);
    }

    public function updateVehicleOutbox($id)
    {
        return $this->EloquentVehicle->updateVehicleOutboxView($id);
    }
    // OUTBOX

    public function vehicleApproved(Request $request)
    {
        return $this->EloquentVehicle->vehicleApprovedView($request);
    }

    public function updateVehicleApproved($id)
    {
        return $this->EloquentVehicle->updateVehicleApprovedView($id);
    }

    public function vehicleRejected(Request $request)
    {
        return $this->EloquentVehicle->vehicleRejectedView($request);
    }

    public function updateVehicleRejected($id)
    {
        return $this->EloquentVehicle->updateVehicleRejectedView($id);
    }
}
