<?php

namespace App\Repository\Permissions;

use App\Models\Designation;
use App\Models\Permission;
use App\Repository\Permissions\PermissionRepository;
use App\Traits\AppHelper;
use Illuminate\Http\Request;

/**
 * | Created On-06-08-2022
 * | Created By-Anshu Kumar
 * ------------------------------------------------------------------------------------------------------------------------------
 * | for Permission operations Repository
 */

class EloquentPermissionRepository implements PermissionRepository
{
    use AppHelper;
    public function __construct()
    {
        $this->menuApp();
        $this->array = ['parents' => $this->parent, 'childs' => $this->child];
    }

    // Permission View
    public function permissionView()
    {
        $designation = Designation::all();
        $array = ['designation' => $designation];
        return view('admin.Setting.permission-entry', $this->array, $array);
    }

    /**
     * | Save Permissions
     * | @param Request
     * | @param Request $request
     * --------------------------------------------------------------------------------------------------------------------
     * | if ($request->status) means admin want to enable the menu permission to the Role
     *                  | In This Case Add the menuID to the Given Role
     *                  | Check if the menu is already existing or not
     * | else means admin wants to disable the menu permission to the given role
     *                  | Check if already existing then remove
     *                  | if already existing In this Case remove the menu ID to the given role
     */
    public function savePermissions(Request $request)
    {
        // Admin wants to add the menu
        if ($request->status) {
            $check = Permission::where('role_id', '=', $request->roleID)
                ->where('menu_id', '=', $request->menuID)->first();
            if ($check) {
                return response()->json('Already Existing', 400);
            }
            $permission = new Permission;
            $permission->role_id = $request->roleID;
            $permission->menu_id = $request->menuID;
            $permission->save();
            return response()->json('Saved Succesfully', 200);
        } else {
            $check = Permission::where('role_id', '=', $request->roleID)
                ->where('menu_id', '=', $request->menuID)->first();
            if ($check) {
                $check->delete();
                return response()->json('disabled Successfully', 200);
            }
            if (!$check) {
                return response()->json('Menu Is Already Disabled', 400);
            }
        }
    }
}
