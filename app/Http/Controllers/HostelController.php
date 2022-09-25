<?php

namespace App\Http\Controllers;

use App\Repository\Hostel\EloquentHostelRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Laravel\Ui\Presets\React;

class HostelController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $virtualRole = Config::get('constant-variable.VIRTUAL_ROLE');
            $user = auth()->user()->role_id ?? $virtualRole;            // variable -1 is for the users end
            $obj = new EloquentHostelRepository($user);
            $this->EloquentHostel = $obj;
            return $next($request);
        });
    }

    function userView()
    {
        return $this->EloquentHostel->view();
    }

    function saveHostel(Request $request)
    {
        // dd($request->all());
        return $this->EloquentHostel->addHostel($request);
    }

    function hostelInbox()
    {
        return $this->EloquentHostel->hostelInboxView();
    }

    function updateHostelInbox($id)
    {
        return $this->EloquentHostel->updateHostelInboxView($id);
    }

    function updateHostel(Request $request)
    {
        return $this->EloquentHostel->editHostel($request);
    }

    function hostelWorkflow(Request $request)
    {
        return $this->EloquentHostel->hostelWorkflowUpdate($request);
    }

    function addComment(Request $request)
    {
        return $this->EloquentHostel->workflowTrack($request);
    }

    function hostelOutbox(Request $request)
    {
        return $this->EloquentHostel->hostelOutboxView($request);
    }

    function hostelOutboxUpdate($id)
    {
        return $this->EloquentHostel->hostelOutboxUpdateView($id);
    }


    function hostelApproved(Request $request)
    {
        return $this->EloquentHostel->hostelApprovedView($request);
    }

    function updateHostelApproved($id)
    {
        return $this->EloquentHostel->updateHostelApprovedView($id);
    }

    function hostelRejected(Request $request)
    {
        return $this->EloquentHostel->hostelRejectedView($request);
    }

    function updateHostelRejected($id)
    {
        return $this->EloquentHostel->updateHostelRejectedView($id);
    }
}
