<?php

namespace App\Traits;

use Yajra\DataTables\DataTables;

/**
 * | Created On-08-09-2022 
 * | Created By-Anshu Kumar
 * | For calling the Yajra DataTable in all modules
 */

trait YajraDatatable
{
    public function myYajra($data, $myLink)
    {
        $datatable = Datatables::of($data, $myLink)
            ->addIndexColumn()
            ->addColumn('action', function ($row, $myLink) {
                $link = "rnc/" . "$myLink" . "/" . $row['id'];
                $btn = "<a class='btn btn-success btn-sm' href='$link' class='edit btn btn-primary btn-sm'>
                                <i class='icon-pen'></i> Details
                            </a>";
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        return $datatable;
    }
}
