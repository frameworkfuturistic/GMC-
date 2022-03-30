<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgencyController extends Controller
{
    use Traits\Agencies;

    public function Index(){
        return $this->indexView();
    }
    public function addAgency(Request $request)
    {
        return $this->store($request);
    }

    // Admin Interface used functions
    public function Inbox(){
        return $this->agencyInbox();
    }

    function updateInbox($id){
        return $this->updateInboxView($id);
    }

    function updateAgency(Request $request){
        return $this->editAgency($request);
    }

    function addComment(Request $request){
        return $this->workflowComment($request);
    }

    function agencyWorkflow(Request $request){
        return $this->agencyWorkflowUpdate($request);
    }

    function Outbox(){
        return $this->outboxView();
    }

    function updateOutbox($id){
        return $this->updateOutboxView($id);
    }

    function agencyApproved(){
        return $this->agencyApprovedView();
    }

    function updateApproved($id){
        return $this->updateApprovedView($id);
    }

    function agencyRejected(){
        return $this->agencyRejectedView();
    }

    function updateRejected($id){
        return $this->updateRejectedView($id);
    }
}
