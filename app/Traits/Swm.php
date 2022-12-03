<?php

namespace App\Traits;

/**
 * | Created On-03-12-2022 
 * | Created By-Anshu Kumar\
 * | Trait for the SWM Survey
 */

trait Swm
{
    public function storeTrait($surveySwm, $req)
    {
        $surveySwm->house_no = $req->houseNo;
        $surveySwm->circle = $req->circle;
        $surveySwm->locality = $req->locality;
        $surveySwm->name = $req->name;
        $surveySwm->father_name = $req->fatherName;
        $surveySwm->holding_no = $req->holdingNo;
        $surveySwm->longitude = $req->longitude;
        $surveySwm->latitude = $req->latitude;
        $surveySwm->mobile = $req->mobile;
        $surveySwm->email = $req->email;
        if ($req->image1)
            $surveySwm->image1 = $this->uploadDocs('img1', $req->image1);
        if ($req->image2)
            $surveySwm->image2 = $this->uploadDocs('img2', $req->image2);
        $surveySwm->user_id = auth()->user()->id;
    }

    public function uploadDocs($version, $img)
    {
        $png_url = $version . '-' . time() . ".png";
        $path = public_path() . "/surveyFiles/SWM/" . $png_url;
        // $img = $req->image1;
        $data = base64_decode($img);
        $success = file_put_contents($path, $data);
        return 'surveyFiles/SWM/' . $png_url;
    }
}
