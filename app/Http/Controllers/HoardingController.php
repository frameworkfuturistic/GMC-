<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Hoarding\EloquentHoardingRepository;

class HoardingController extends Controller
{

    public function __construct(EloquentHoardingRepository $eloquentHoarding)
    {
        $this->EloquentHoarding=$eloquentHoarding;
    }

    public function newHoarding(){
        return $this->EloquentHoarding->newHoarding();
    }

    public function lastBill(){
        return $this->EloquentHoarding->lastBill();
    }

    public function hoardingPayment(){
        return $this->EloquentHoarding->hoardingPayment();
    }

    public function currentHoarding(){
        return $this->EloquentHoarding->currentHoarding();
    }

    public function rejectedHoarding(){
        return $this->EloquentHoarding->rejectedHoarding();
    }

    public function vendorProfile(){
        return $this->EloquentHoarding->vendorProfile();
    }

    public function hoardingRules(){
        return $this->EloquentHoarding->hoardingRules();
    }

    public function storeHoarding(Request $request){
        return $this->EloquentHoarding->storeHoarding($request);
    }

    /* FOR ADMIN USED FUNCTIONS */
    // VIEW
    public function hoardingInbox(){
        return $this->EloquentHoarding->hoardingInbox();
    }

    public function hoardingInboxByID($id){
        return $this->EloquentHoarding->hoardingInboxByID($id);
    }

    public function hoardingOutbox(){
        return $this->EloquentHoarding->hoardingOutbox();
    }

    public function hoardingOutboxByID($id){
        return $this->EloquentHoarding->hoardingOutboxByID($id);
    }

    public function hoardingPmt(){
        return $this->EloquentHoarding->hoardingPmt();
    }

    public function hoardingApproved(){
        return $this->EloquentHoarding->hoardingApproved();
    }

    public function hoardingApprovedByID($id){
        return $this->EloquentHoarding->hoardingApprovedByID($id);
    }

    public function hoardingRejected(){
        return $this->EloquentHoarding->hoardingRejected();
    }

    public function hoardingRejectedByID($id){
        return $this->EloquentHoarding->hoardingRejectedByID($id);
    }
    // VIEW

    public function editHoarding(Request $request, $id){
        return $this->EloquentHoarding->editHoarding($request,$id);
    }

    public function addComment(Request $request){
        return $this->EloquentHoarding->addComment($request);
    }

    public function hoardingWorkflow(Request $request){
        return $this->EloquentHoarding->hoardingWorkflow($request);
    }
    /* FOR ADMIN USED FUNCTIONS */

}
