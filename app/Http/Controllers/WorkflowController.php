<?php

namespace App\Http\Controllers;

use App\Traits\AppHelper;

/**
 * Created On-04-08-2022
 * Created By-Anshu Kumar
 * ------------------------------------------------------------------------------------------------------------------------
 * For Workflow Management System and Workflow Candidates
 */
class WorkflowController extends Controller
{
    use AppHelper;
    // Initializing Construct
    public function __construct()
    {
        $this->menuApp();
        $this->array = ['parents' => $this->parent, 'childs' => $this->child];
    }
    // Workflow Entry View
    public function workflowView()
    {
        return view('admin.Setting.workflow', $this->array);
    }
}
