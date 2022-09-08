<?php

namespace App\Http\Controllers;

use App\Repository\Dharmsala\EloquentDharmsalaRepository;
use Illuminate\Http\Request;
use App\Models\Dharmasala;

class DharmasalaController extends Controller
{

    public function __construct(EloquentDharmsalaRepository $eloquentDharmsala)
    {
        $this->EloquentDharmsala = $eloquentDharmsala;
    }

    function userView()
    {
        return $this->EloquentDharmsala->view();
    }

    function saveDharmasala(Request $request)
    {
        // dd($request->all());
        return $this->EloquentDharmsala->addDharmasala($request);
    }

    function dharmasalaInbox()
    {
        return $this->EloquentDharmsala->inboxView();
    }

    function updateDharmasalaInbox($id)
    {
        return $this->EloquentDharmsala->updateDharmasalaInboxView($id);
    }

    function updateDharmasala(Request $request)
    {
        return $this->EloquentDharmsala->editDharmasala($request);
    }

    function dharmasalaWorkflow(Request $request)
    {
        return $this->EloquentDharmsala->workflowUpdate($request);
    }

    function dharmasalaOutbox(Request $request)
    {
        return $this->EloquentDharmsala->dharmasalaOutboxView($request);
    }

    function dharmasalaOutboxUpdate($id)
    {
        return $this->EloquentDharmsala->dharmasalaOutboxUpdateView($id);
    }

    function addComment(Request $request)
    {
        return $this->EloquentDharmsala->workflowTrack($request);
    }

    function dharmasalaApproved(Request $request)
    {
        return $this->EloquentDharmsala->dharmasalaApprovedView($request);
    }

    function updateDharmasalaApproved($id)
    {
        return $this->EloquentDharmsala->updateDharmasalaApprovedView($id);
    }

    function dharmasalaRejected(Request $request)
    {
        return $this->EloquentDharmsala->DharmasalaRejectedView($request);
    }

    function updateDharmasalaRejected($id)
    {
        return $this->EloquentDharmsala->updateDharmasalaRejectedView($id);
    }
}
