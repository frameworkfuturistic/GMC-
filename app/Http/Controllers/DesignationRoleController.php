<?php

namespace App\Http\Controllers;

use App\Repository\DesignationRole\EloquentDesignationRole;
use Illuminate\Http\Request;

/**
 * | Created On-05-09-2022
 * | Created By-Anshu Kumar
 * -----------------------------------------------------------------------------------------------------------------------
 * | Created For Designation Role Crud Operations
 * -----------------------------------------------------------------------------------------------------------------------
 */
class DesignationRoleController extends Controller
{

    protected $eloquent_designation_role;
    // Initializing construct function for repository
    public function __construct(EloquentDesignationRole $eloquent_designation_role)
    {
        $this->Repository = $eloquent_designation_role;
    }

    // Designation Role View
    public function designationRoleView()
    {
        return $this->Repository->designationRoleView();
    }

    // Add New Designation Role
    public function addDesignationRole(Request $request)
    {
        return $this->Repository->addDesignationRole($request);
    }

    // Update Designation Role
    public function updateDesignationRole(Request $request)
    {
        return $this->Repository->updateDesignationRole($request);
    }

    // Get Roles by Designation ID
    public function getRoleByDesignationID($id)
    {
        return $this->Repository->getRoleByDesignationID($id);
    }

    // Get Designation Role By ID
    public function getDesignationRoleByID($id)
    {
        return $this->Repository->getDesignationRoleByID($id);
    }
}
