<?php

namespace App\Traits;

use App\Models\MenuMaster;

trait AppHelper
{
    /*
    APP HELPER TRAIT HELPS TO DEFINE THE PARENT AND CHILD MENUES
     */
    protected $parent;
    protected $ParentSerial;

    public function menuApp()
    {
        $this->parent = MenuMaster::all()->where('ParentSerial', '0');
        $this->child = MenuMaster::all()->where('ParentSerial', '<>', '0');
    }
}
