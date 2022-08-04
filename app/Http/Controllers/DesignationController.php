<?php

namespace App\Http\Controllers;

use App\Traits\AppHelper;

/**
 * Created By-Anshu Kumar
 * Created On-04-08-2022
 * -----------------------------------------------------------------------------------------------------------------------
 * For Designation view and Entries
 */
class DesignationController extends Controller
{
    use AppHelper;

    public function __construct()
    {
        $this->menuApp();
        $this->array = ['parents' => $this->parent, 'childs' => $this->child];
    }

    // Designation Entry View
    public function designationView()
    {
        return view('admin.Setting.designation-entry', $this->array);
    }

    // Designation Role View
    public function designationRoleView()
    {
        return view('admin.Setting.designation-role-entry', $this->array);
    }

    // Permission View
    public function permissionView()
    {
        return view('admin.Setting.permission-entry', $this->array);
    }
}
