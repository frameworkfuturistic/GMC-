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
        $shop->Photo1Path = $request->Photo1Path;
        $shop->Photo2Path = $request->Photo2Path;
        $shop->Remarks = $request->Remarks;
        $shop->save();
    }
}
