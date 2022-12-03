<?php

namespace App\Repository\Survey;

/**
 * | Created On-03-12-2022 
 * | Created By-Anshu Kumar
 * | Created for the Interface for SWM Survey
 */
interface iSwmRepo
{
    public function store($req);    // Store Swm Survey
    public function update($req);   // Update SWM Survey
    public function getSwmById($req);       // Get Swm survey By ID
    public function getAllSurveys();        // Get All the Survey Swms
}
