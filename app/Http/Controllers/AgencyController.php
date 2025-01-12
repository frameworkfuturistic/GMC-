<?php

namespace App\Http\Controllers;

use App\Repository\Agency\EloquentAgencyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class AgencyController extends Controller
{

    protected $eloquentAgency;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $virtualRole = Config::get('constant-variable.VIRTUAL_ROLE');
            $user = auth()->user()->role_id ?? $virtualRole;            // variable -1 is for the users end
            $obj = new EloquentAgencyRepository($user);
            $this->EloquentAgency = $obj;
            return $next($request);
        });
    }

    public function Index()
    {
        return $this->EloquentAgency->indexView();
    }

    public function addAgency(Request $request)
    {
        return $this->EloquentAgency->store($request);
    }

    // Admin Interface used functions
    public function Inbox()
    {
        return $this->EloquentAgency->agencyInbox();
    }

    public function updateInbox($id)
    {
        return $this->EloquentAgency->updateInboxView($id);
    }

    public function updateAgency(Request $request)
    {
        return $this->EloquentAgency->editAgency($request);
    }

    public function addComment(Request $request)
    {
        return $this->EloquentAgency->workflowComment($request);
    }

    public function agencyWorkflow(Request $request)
    {
        return $this->EloquentAgency->agencyWorkflowUpdate($request);
    }

    public function Outbox(Request $request)
    {
        return $this->EloquentAgency->outboxView($request);
    }

    public function updateOutbox($id)
    {
        return $this->EloquentAgency->updateOutboxView($id);
    }

    public function agencyApproved(Request $request)
    {
        return $this->EloquentAgency->agencyApprovedView($request);
    }

    public function updateApproved($id)
    {
        return $this->EloquentAgency->updateApprovedView($id);
    }

    public function agencyRejected(Request $request)
    {
        return $this->EloquentAgency->agencyRejectedView($request);
    }

    public function updateRejected($id)
    {
        return $this->EloquentAgency->updateRejectedView($id);
    }
}
