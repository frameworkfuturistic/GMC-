<?php

namespace App\Repository\DesignationRole;

use App\Models\Designation;
use App\Models\DesignationRole as DesignationRoleModel;
use App\Repository\DesignationRole\DesignationRole;
use App\Traits\AppHelper;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * | Created On-05-08-2022
 * | Created By-Anshu Kumar
 * ----------------------------------------------------------------------------------------------------------------------
 * | Created For-Repository for the CRUD operations
 */

class EloquentDesignationRole implements DesignationRole
{
    use AppHelper;

    public function __construct()
    {
        $this->menuApp();
        $this->array = ['parents' => $this->parent, 'childs' => $this->child];
    }

    // Designation Role View
    public function designationRoleView()
    {
        $designation = Designation::all();
        return view('admin.Setting.designation-role-entry', $this->array, ['designations' => $designation]);
    }

    /**
     * | Add New Designation Role
     * | @param Illuminate\Http\Request
     * | @param Illuminate\Http\Request $request
     */
    public function addDesignationRole(Request $request)
    {
        $request->validate([
            'designationID' => 'required',
            'newDesignationRole' => 'required',
        ]);

        try {
            $stmt = "SELECT * FROM designation_roles
                     WHERE designation_id=$request->designationID AND role_name='$request->newDesignationRole'";
            $check_existing = DB::select($stmt);
            if ($check_existing) {
                return response()->json('Role already Existing for this Designation', 400);
            }
            $designation_role = new DesignationRoleModel;
            $designation_role->designation_id = $request->designationID;
            $designation_role->role_name = $request->newDesignationRole;
            $designation_role->save();
            return response()->json('Successfully Saved the Role', 200);
        } catch (Exception $e) {
            return response()->json($e, 400);
        }
    }

    /**
     * | Update Designation Role
     * | @param Illuminate\Http\Request
     * | @param Illuminate\Http\Request $request
     */
    public function updateDesignationRole(Request $request)
    {
        $request->validate([
            'updDesignationID' => 'required',
            'roleUpd' => 'required',
        ]);

        try {
            try {
                $stmt = "SELECT * FROM designation_roles
                         WHERE designation_id=$request->updDesignationID AND role_name='$request->roleUpd'";
                $check_existing = DB::select($stmt);
                if ($check_existing) {
                    return response()->json('Role already Existing for this Designation', 400);
                }
                $designation_role = DesignationRoleModel::find($request->id);
                $designation_role->designation_id = $request->updDesignationID;
                $designation_role->role_name = $request->roleUpd;
                $designation_role->save();
                return response()->json('Successfully Updated the Role', 200);
            } catch (Exception $e) {
                return response()->json($e, 400);
            }
        } catch (Exception $e) {
            return response()->json($e, 400);
        }
    }

    /**
     * | Get Role By Designation ID
     * | @param DesignationID $id
     * | @return Response
     */
    public function getRoleByDesignationID($id)
    {
        $roles = DesignationRoleModel::where('designation_id', $id)->get();
        return $roles;
    }

    /**
     * | Get Designation Role By ID
     * |------------------------------------------------------------------------------------------------------------
     */
    public function getDesignationRoleByID($id)
    {
        $role = DesignationRoleModel::find($id);
        return $role;
    }
}
