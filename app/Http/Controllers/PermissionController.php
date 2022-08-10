<?php

namespace App\Http\Controllers;

use App\Repository\Permissions\EloquentPermissionRepository;
use Illuminate\Http\Request;

/**
 * | Created On-06-08-2022
 * | Created By-Anshu Kumar
 * -------------------------------------------------------------------------------------------------------------------------------
 * | Permission Enable for Users Role and View
 */
class PermissionController extends Controller
{
    //Initializing Construct Function
    protected $eloquent_permission;
    public function __construct(EloquentPermissionRepository $eloquent_permission)
    {
        $this->Repository = $eloquent_permission;
    }

    // Permission View
    public function permissionView()
    {
        return $this->Repository->permissionView();
    }

    // Save Permission
    public function savePermissions(Request $request)
    {
        return $this->Repository->savePermissions($request);
    }
}
