<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hostel;

class HostelController extends Controller
{

    use Traits\Hostels;

    function userView(){
        return $this->view();
    }

    function saveHostel(Request $request){
        // dd($request->all());
        return $this->addHostel($request);
     }

     function hostelInbox(){
         return $this->hostelInboxView();
     }

     function updateHostelInbox($id){
         return $this->updateHostelInboxView($id);
     }

     function updateHostel(Request $request){
         return $this->editHostel($request);
     }

     function hostelWorkflow(Request $request){
         return $this->hostelWorkflowUpdate($request);
     }

     function addComment(Request $request){
            return $this->workflowTrack($request);
        }

     function hostelOutbox(){
         return $this->hostelOutboxView();
     }

     function hostelOutboxUpdate($id){
         return $this->hostelOutboxUpdateView($id);
     }

     
     function hostelApproved(){
        return $this->hostelApprovedView();
    }

    function updateHostelApproved($id){
        return $this->updateHostelApprovedView($id);
    }

    function hostelRejected(){
        return $this->hostelRejectedView();
    }

    function updateHostelRejected($id){
        return $this->updateHostelRejectedView($id);
    }

}
