<?php

namespace App\Traits;

use App\Models\MenuMaster;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait AppHelper
{
    /*
    APP HELPER TRAIT HELPS TO DEFINE THE PARENT AND CHILD MENUES
     */
    protected $parent;
    protected $ParentSerial;

    public function menuApp($roleID)
    {
        $this->parent = MenuMaster::all()->where('ParentSerial', '0');
        $query = "SELECT
                    p.*,
                    m.*
                    FROM permissions p
                    INNER JOIN menu_masters m ON m.MenuID=p.MenuID

                    WHERE RoleID=$roleID";

        $this->child = DB::select($query);
    }
    // public function menuApp()
    // {
    //     $this->parent = MenuMaster::all()->where('ParentSerial', '0');
    //     $this->child = MenuMaster::all()->where('ParentSerial', '<>', '0');
    // }
}
