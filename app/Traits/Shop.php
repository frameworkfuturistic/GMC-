<?php

namespace App\Traits;

trait Shop
{
    public function storing($shop, $request)
    {
        $shop->Circle = $request->Circle;
        $shop->Market = $request->Market;
        $shop->SerialNo = $request->SerialNo;
        $shop->Allottee = $request->Allottee;
        $shop->ShopNo = $request->ShopNo;
        $shop->AllottedLength = $request->AllottedLength;
        $shop->AllottedBreadth = $request->AllottedBreadth;
        $shop->AllottedHeight = $request->AllottedHeight;
        $shop->PresentLength = $request->PresentLength;
        $shop->PresentBreadth = $request->PresentBreadth;
        $shop->PresentHeight = $request->PresentHeight;
        $shop->NoOfFloors = $request->NoOfFloors;
        $shop->PresentOccupier = $request->PresentOccupier;
        $shop->TradeLicense = $request->TradeLicense;
        $shop->Construction = $request->Construction;
        $shop->Electricity = $request->Electricity;
        $shop->Water = $request->Water;
        $shop->SalePurchase = $request->SalePurchase;
        $shop->ContactNo = $request->ContactNo;
        $shop->Longitude = $request->Longitude;
        $shop->Latitude = $request->Latitude;
        $shop->Remarks = $request->Remarks;

        // PhotoUploads
        // Photo1
        $png_url = "shop-" . time() . ".png";
        $path = public_path() . "/surveyFiles/" . $png_url;
        $photo1_path = $request->Photo1Path;
        $data = base64_decode($photo1_path);
        $success = file_put_contents($path, $data);
        $shop->Photo1Path = 'surveyFiles/' . $png_url;

        // Photo2
        $png_url = "shop-" . time() . ".png";
        $path = public_path() . "/surveyFiles/" . $png_url;
        $photo2_path = $request->Photo2Path;
        $data = base64_decode($photo2_path);
        $success = file_put_contents($path, $data);
        $shop->Photo2Path = 'surveyFiles/' . $png_url;

        // Photo3
        $png_url = "shop-" . time() . ".png";
        $path = public_path() . "/surveyFiles/" . $png_url;
        $photo3_path = $request->Photo3Path;
        $data = base64_decode($photo3_path);
        $success = file_put_contents($path, $data);
        $shop->Photo3Path = 'surveyFiles/' . $png_url;

        $shop->save();
    }
}
