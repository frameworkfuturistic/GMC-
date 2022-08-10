<?php

namespace App\Http\Controllers;

use App\Models\MenuMaster;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function getAllMenuMasters()
    {
        $menu_master = MenuMaster::all();
        return $menu_master;
    }

    public function getMenuMasterByRoleID($id)
    {
        $stmt = "select m.MenuID,
                m.MenuString,
                m.Description,
                (select if (p1.role_id is null,$id,p1.role_id)) as role_id,
                (select if (p1.role_id is null,0,1)) as enabled
                from menu_masters m
        left join (Select * from permissions p where p.role_id=$id group by menu_id) as p1 on m.MenuID=menu_id
        where m.Description is not null";

        $menu_master = DB::select($stmt);
        return $menu_master;
    }
}
