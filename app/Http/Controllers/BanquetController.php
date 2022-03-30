<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BanquetHall;

class BanquetController extends Controller
{
    use Traits\Banquet;

    function userView(){
      return $this->view();
    }

    function saveBanquet(Request $request){
       //dd($request->all());
       return $this->addBanquet($request);
    }

    function banquetInbox(){
        return $this->banquetInboxView();
    }

    function udpateBanquetInbox($id){
        return $this->udpateBanquetInbox($id);
    }

    function updateBanquet(Request $request){
        return $this->editBanquet($request);
    }

    function banquetWorkflow(Request $request){
        return $this->banquetWorkflowUpdate($request);
    }

    function addComment(Request $request){
        return $this->workflowTrack($request);
    }

    function banquetOutbox(){
        return $this->banquetOutboxView();
    }

    function banquetOutboxUpdate($id){
        return $this->updateBanquetOutbox($id);
    }

    function banquetApproved(){
        return $this->banquetApprovedView();
    }

    function updateBanquetApproved($id){
        return $this->updateBanquetApprovedView($id);
    }

    function banquetRejected(){
        return $this->banquetBanquetView();
    }

    function updateBanquetRejected($id){
        return $this->updateBanquetRejectedView($id);
    }
}
