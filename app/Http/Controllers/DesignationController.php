<?php

namespace App\Http\Controllers;

use App\Repository\Designation\EloquentDesignationRepository;
use Illuminate\Http\Request;

/**
 *| Created By-Anshu Kumar
 *| Created On-04-08-2022
 *| -----------------------------------------------------------------------------------------------------------------------
 *| For Designation view and Entries
 */

class DesignationController extends Controller
{
    protected $eloquent_designation;

    public function __construct(EloquentDesignationRepository $eloquent_designation)
    {
        $this->Repository = $eloquent_designation;
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
