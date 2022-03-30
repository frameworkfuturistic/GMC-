<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dharmasala;

class DharmasalaController extends Controller
{
    use Traits\Dharmasalas;

    function userView(){
        return $this->view();
    }

    function saveDharmasala(Request $request){
        // dd($request->all());
        return $this->addDharmasala($request);
     }

     function dharmasalaInbox(){
         return $this->inboxView();
     }

     function updateDharmasalaInbox($id){
         return $this->updateDharmasalaInboxView($id);
     }

     function updateDharmasala(Request $request){
         return $this->editDharmasala($request);
     }

     function dharmasalaWorkflow(Request $request){
         return $this->workflowUpdate($request);
     }

     function dharmasalaOutbox(){
         return $this->dharmasalaOutboxView();
     }

     function dharmasalaOutboxUpdate($id){
         return $this->dharmasalaOutboxUpdateView($id);
     }

     function addComment(Request $request){
        return $this->workflowTrack($request);
    }

    function dharmasalaApproved(){
        return $this->dharmasalaApprovedView();
    }

    function updateDharmasalaApproved($id){
        return $this->updateDharmasalaApprovedView($id);
    }

    function dharmasalaRejected(){
        return $this->DharmasalaRejectedView();
    }

    function updateDharmasalaRejected($id){
        return $this->updateDharmasalaRejectedView($id);
    }
}
