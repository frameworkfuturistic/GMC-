<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Toll\EloquentTollRepository;

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
     * Save Toll and Payment
     */
    public function addToll(Request $request)
    {
        return $this->EloquentToll->addToll($request);
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
}
