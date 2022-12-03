<?php

namespace App\Repository\Survey;

use App\Models\SWM\SurveySwm;
use App\Repository\Survey\iSwmRepo;
use App\Traits\Swm;
use Exception;

/**
 * | Created On-03-12-2022 
 * | Created By-Anshu Kumar
 * | Repository for the Swm Repository Survey Shop
 */

class SwmRepo implements iSwmRepo
{
    use Swm;
    private $_surveySwm;
    public function __construct()
    {
        $this->_surveySwm = new SurveySwm();
    }

    public function store($req)
    {
        try {
            $surveySwm = $this->_surveySwm;
            $this->storeTrait($surveySwm, $req);
            $surveySwm->save();
            return response()->json(["status" => true, "message" => "Successfully Saved", "data" => ""]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * | Update 
     */
    public function update($req)
    {
        try {
            $surveySwm = SurveySwm::find($req->id);
            $this->storeTrait($surveySwm, $req);
            $surveySwm->save();
            return response()->json(["status" => true, "message" => "Successfully Saved", "data" => ""]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * | Get Swm SurveyBy ID
     */
    public function getSwmById($req)
    {
        $surveySwm = SurveySwm::find($req->id);
        return response()->json(["status" => true, "message" => "Fetched Data", "data" => $surveySwm]);
    }

    /**
     * | Get All Survey Swms
     */
    public function getAllSurveys()
    {
        $surveySwm = SurveySwm::orderByDesc('id')
            ->get();
        return response()->json(["status" => true, "message" => "Fetched Data", "data" => $surveySwm]);
    }
}
