<?php

namespace App\Traits;

trait Toll
{
    public function saving($toll, $request)
    {
        $toll->AreaName = $request->AreaName;
        $toll->ShopNo = $request->ShopNo;
        $toll->ShopType = $request->ShopType;
        $toll->VendorName = $request->VendorName;
        $toll->Address = $request->Address;
        $toll->Rate = $request->Rate;

        $lPaymentDate = date_create($request->LastPaymentDate);
        $toll->LastPaymentDate = date_format($lPaymentDate, "Y-m-d");

        $toll->LastAmount = $request->LastAmount;

        $toll->Location = $request->Location;
        $toll->PresentLength = $request->PresentLength;
        $toll->PresentBreadth = $request->PresentBreadth;
        $toll->PresentHeight = $request->PresentHeight;
        $toll->NoOfFloors = $request->NoOfFloors;
        $toll->TradeLicense = $request->TradeLicense;
        $toll->Construction = $request->Construction;
        $toll->Utility = $request->Utility;
        $toll->Mobile = $request->Mobile;
        $toll->Remarks = $request->Remarks;
        $toll->Photograph1 = $request->Photograph1;
        $toll->Photograph2 = $request->Photograph2;
        $toll->Longitude = $request->Longitude;
        $toll->Latitude = $request->Latitude;
    }
}
