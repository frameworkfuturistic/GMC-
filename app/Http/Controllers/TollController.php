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
     * Save Toll and Payment (Version 1)
     */
    public function addToll(Request $request)
    {
        return $this->EloquentToll->addToll($request);
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
    public function getToll($id)
    {
        return $this->EloquentToll->getToll($id);
    }

    /**
     * Get All Tolls
     */
    public function getAllToll()
    {
        return $this->EloquentToll->getAllToll();
    }

    // Get All Area of Tolls
    public function getTollArea()
    {
        return $this->EloquentToll->getTollArea();
    }

    // Get Market By Area
    public function getTollMarketByArea($area)
    {
        return $this->EloquentToll->getTollMarketByArea($area);
    }

    // Get Vendor Details By Ids
    public function getVendorDetailsById($id)
    {
        return $this->EloquentToll->getVendorDetailsById($id);
    }
}
