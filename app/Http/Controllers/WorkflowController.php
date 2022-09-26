<?php

namespace App\Http\Controllers;

use App\Traits\AppHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

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
        $this->middleware(function ($request, $next) {
            $virtualRole = Config::get('constant-variable.VIRTUAL_ROLE');
            $user = auth()->user()->role_id ?? $virtualRole;            // variable -1 is for the users end
            $this->menuApp($this->user_info);
            $this->array = ['parents' => $this->parent, 'childs' => $this->child];
            return $next($request);
        });
    }
    // Workflow Entry View
    public function workflowView()
    {
        return view('admin.Setting.workflow', $this->array);
    }
}
