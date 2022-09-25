<?php

namespace App\Http\Controllers;

use App\Repository\Banquet\EloquentBanquetRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class BanquetController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $virtualRole = Config::get('constant-variable.VIRTUAL_ROLE');
            $user = auth()->user()->role_id ?? $virtualRole;            // variable -1 is for the users end
            $obj = new EloquentBanquetRepository($user);
            $this->EloquentBanquet = $obj;
            return $next($request);
        });
    }

    function userView()
    {
        return $this->EloquentBanquet->view();
    }

    function saveBanquet(Request $request)
    {
        //dd($request->all());
        return $this->EloquentBanquet->addBanquet($request);
    }

    function banquetInbox()
    {
        return $this->EloquentBanquet->banquetInboxView();
    }

    function updateBanquetInbox($id)
    {
        return $this->EloquentBanquet->updateBanquetInbox($id);
    }

    function updateBanquet(Request $request)
    {
        return $this->EloquentBanquet->editBanquet($request);
    }

    function banquetWorkflow(Request $request)
    {
        return $this->EloquentBanquet->banquetWorkflowUpdate($request);
    }

    function addComment(Request $request)
    {
        return $this->EloquentBanquet->workflowTrack($request);
    }

    function banquetOutbox(Request $request)
    {
        return $this->EloquentBanquet->banquetOutboxView($request);
    }

    function banquetOutboxUpdate($id)
    {
        return $this->EloquentBanquet->updateBanquetOutbox($id);
    }

    function banquetApproved(Request $request)
    {
        return $this->EloquentBanquet->banquetApprovedView($request);
    }

    function updateBanquetApproved($id)
    {
        return $this->EloquentBanquet->updateBanquetApprovedView($id);
    }

    function banquetRejected(Request $request)
    {
        return $this->EloquentBanquet->banquetBanquetView($request);
    }

    function updateBanquetRejected($id)
    {
        return $this->EloquentBanquet->updateBanquetRejectedView($id);
    }
}
