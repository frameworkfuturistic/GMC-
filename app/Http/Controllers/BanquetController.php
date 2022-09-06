<?php

namespace App\Http\Controllers;

use App\Repository\Banquet\EloquentBanquetRepository;
use Illuminate\Http\Request;
use App\Models\BanquetHall;

class BanquetController extends Controller
{

    public function __construct(EloquentBanquetRepository $eloquentBanquet)
    {
        $this->EloquentBanquet = $eloquentBanquet;
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

    function banquetApproved()
    {
        return $this->EloquentBanquet->banquetApprovedView();
    }

    function updateBanquetApproved($id)
    {
        return $this->EloquentBanquet->updateBanquetApprovedView($id);
    }

    function banquetRejected()
    {
        return $this->EloquentBanquet->banquetBanquetView();
    }

    function updateBanquetRejected($id)
    {
        return $this->EloquentBanquet->updateBanquetRejectedView($id);
    }
}
