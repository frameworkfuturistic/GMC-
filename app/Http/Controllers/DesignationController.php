<?php

namespace App\Http\Controllers;

use App\Repository\Designation\EloquentDesignationRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

/**
 *| Created By-Anshu Kumar
 *| Created On-04-08-2022
 *| -----------------------------------------------------------------------------------------------------------------------
 *| For Designation view and Entries
 */

class DesignationController extends Controller
{
    protected $eloquent_designation;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $virtualRole = Config::get('constant-variable.VIRTUAL_ROLE');
            $user = auth()->user()->role_id ?? $virtualRole;            // variable -1 is for the users end
            $obj = new EloquentDesignationRepository($user);
            $this->Repository = $obj;
            return $next($request);
        });
    }

    // Designation Entry View
    public function designationView()
    {
        return $this->Repository->designationView();
    }

    // Designation Role View
    public function designationRoleView()
    {
        return $this->Repository->designationRoleView();
    }

    // Permission View
    public function permissionView()
    {
        return $this->Repository->permissionView();
    }

    // Add New Designation
    public function addDesignation(Request $request)
    {
        return $this->Repository->addDesignation($request);
    }

    // Update Designation
    public function updateDesignation(Request $request)
    {
        return $this->Repository->updateDesignation($request);
    }

    // Get All Designations
    public function getDesignations()
    {
        return $this->Repository->getDesignations();
    }

    // Get Designation By ID
    public function getDesignationByID($id)
    {
        return $this->Repository->getDesignationByID($id);
    }
}
