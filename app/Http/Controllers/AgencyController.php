<?php
namespace App\Http\Controllers;

use App\Repository\Agency\EloquentAgencyRepository;
use Illuminate\Http\Request;

class AgencyController extends Controller
{

    protected $eloquentAgency;

    public function __construct(EloquentAgencyRepository $eloquentAgency)
    {
        $this->EloquentAgency = $eloquentAgency;
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

    public function Outbox()
    {
        return $this->EloquentAgency->outboxView();
    }

    public function updateOutbox($id)
    {
        return $this->EloquentAgency->updateOutboxView($id);
    }

    public function agencyApproved()
    {
        return $this->EloquentAgency->agencyApprovedView();
    }

    public function updateApproved($id)
    {
        return $this->EloquentAgency->updateApprovedView($id);
    }

    public function agencyRejected()
    {
        return $this->EloquentAgency->agencyRejectedView();
    }

    public function updateRejected($id)
    {
        return $this->EloquentAgency->updateRejectedView($id);
    }
}
