<?php

namespace App\Http\Controllers;

use App\Repository\Toll\EloquentTollRepository;
use Illuminate\Http\Request;

class TollController extends Controller
{
    /**
     * Created On-07-07-2022
     * Created By-Anshu Kumar
     * -----------------------------------------------------------------------------------------
     * Save Toll and Toll Payment
     *
     */
    protected $eloquentToll;
    public function __construct(EloquentTollRepository $eloquentToll)
    {
        $this->EloquentToll = $eloquentToll;
    }

    /**
     * Save Toll Payment (Version 2)
     */
    public function tollPayment(Request $request, $id)
    {
        return $this->EloquentToll->tollPayment($request, $id);
    }

    /**
     * Get Tolls
     */
    public function getTollById($id)
    {
        return $this->EloquentToll->getTollById($id);
    }

    /**
     * Get All Tolls
     */
    public function getAllToll()
    {
        return $this->EloquentToll->getAllToll();
    }

    // Get Location By Area
    public function getTollLocation()
    {
        return $this->EloquentToll->getTollLocation();
    }

    // Get Vendor Details By Ids
    public function getVendorDetailsByArea(Request $request)
    {
        return $this->EloquentToll->getVendorDetailsByArea($request);
    }

    // Save Toll
    public function saveToll(Request $request)
    {
        return $this->EloquentToll->saveToll($request);
    }

    // Update Toll
    public function updateToll(Request $request, $id)
    {
        return $this->EloquentToll->updateToll($request, $id);
    }

    // Get Toll Area List
    public function getAreaList()
    {
        return $this->EloquentToll->getAreaList();
    }

    // Total Toll Collection
    public function totalCollection(Request $request)
    {
        return $this->EloquentToll->totalCollection($request);
    }

    // Toll Master View
    public function tollMaster(Request $req)
    {
        return $this->EloquentToll->tollMaster($req);
    }

    // Export all the toll master to excel
    public function exportToExcel()
    {
        return $this->EloquentToll->exportToExcel();
    }
}
