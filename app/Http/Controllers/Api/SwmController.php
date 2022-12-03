<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SWM\SurveySwm;
use App\Repository\Survey\iSwmRepo;
use App\Repository\Survey\SwmRepo;
use Illuminate\Http\Request;

class SwmController extends Controller
{
    /**
     * | Created On-03-12-2022 
     * | Created By-Anshu Kumar
     */
    protected $_repo;

    public function __construct(iSwmRepo $repo)
    {
        $this->_repo = $repo;
    }

    public function store(Request $req)
    {
        return $this->_repo->store($req);
    }

    // Update Survey SWM
    public function update(Request $req)
    {
        $req->validate([
            'id' => 'required|integer'
        ]);

        return $this->_repo->update($req);
    }

    // Get Survey Details by ID
    public function getSwmById(Request $req)
    {
        $req->validate([
            'id' => 'required|integer'
        ]);
        return $this->_repo->getSwmById($req);
    }

    // Get All Surveys
    public function getAllSurveys()
    {
        return $this->_repo->getAllSurveys();
    }
}
