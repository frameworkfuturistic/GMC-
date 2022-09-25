<?php

namespace App\Repository\Designation;

use App\Models\Designation;
use App\Repository\Designation\DesignationRepository;
use App\Traits\AppHelper;
use Exception;
use Illuminate\Http\Request;

/**
 * | Created On-05-08-2022
 * | Created By-Anshu Kumar
 * |--------------------------------------------------------------------------------------------------------------------
 * | Created for- Designation View, and Designation CRUD operations
 */

class EloquentDesignationRepository implements DesignationRepository
{
    use AppHelper;

    public function __construct($roleID)
    {
        $this->menuApp($roleID);
        $this->array = ['parents' => $this->parent, 'childs' => $this->child];
    }

    // Designation Entry View
    public function designationView()
    {
        return view('admin.Setting.designation-entry', $this->array);
    }

    // Permission View
    public function permissionView()
    {
        return view('admin.Setting.permission-entry', $this->array);
    }

    /**
     * | Add New Designation
     * |----------------------------------------------------------------------------------------------------
     * | @param Illuminate\Http\Request
     * | @param Request $request
     * | @return response message
     */
    public function addDesignation(Request $request)
    {
        $request->validate([
            'designation' => 'required|unique:designations',
        ]);

        try {
            $designation = new Designation;
            $designation->designation = $request->designation;
            $designation->save();
        } catch (Exception $e) {
            return response()->json($e, 400);
        }
    }

    /**
     * | Update Designation By ID
     * |-----------------------------------------------------------------------------------------------------
     * | @param Illuminate\Http\Request
     * | @param Request $request
     * | @param DesignationID $id
     */
    public function updateDesignation(Request $request)
    {

        $request->validate([
            'designationUpd' => 'required',
        ]);

        try {
            $check_existing = Designation::where('designation', '=', $request->designationUpd)->first();
            if ($check_existing) {
                return response()->json('Designation Already Existing', 400);
            }

            $designation = Designation::find($request->id);
            $designation->designation = $request->designationUpd;
            $designation->save();
        } catch (Exception $e) {
            return response()->json($e, 400);
        }
    }

    /**
     * | Get All Designations
     * |---------------------------------------------------------------------------------------------------
     * | Retrieving All Designations Data
     */
    public function getDesignations()
    {
        $designation = Designation::all();
        return $designation;
    }

    /**
     * | Get Designation By ID
     * |---------------------------------------------------------------------------------------------------
     * | @param DesignationID $id
     * | @return Response
     */
    public function getDesignationByID($id)
    {
        $designation = Designation::find($id);
        return $designation;
    }
}
