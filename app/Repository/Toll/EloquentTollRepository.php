<?php

namespace App\Repository\Toll;

use App\Models\Toll;
use App\Models\TollPayment;
use App\Repository\Toll\TollRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EloquentTollRepository implements TollRepository
{
    /**
     * Created On-07-07-2022
     * Created By-Anshu Kumar
     * ------------------------------------------------------------------------------------------
     * Repository for Toll payments and Tolls
     * ------------------------------------------------------------------------------------------
     * ------------------------------------------------------------------------------------------
     */

    /**
     * Save Tolls and Toll Payment Version 1 (Toll Payment)
     */
    public function addToll(Request $request)
    {
        $request->validate([
            'VendorName' => 'required',
            'MarketName' => 'required',
            'AreaName' => 'required',
            'Rate' => 'required',
        ]);

        try {
            $toll = new Toll;
            $toll->VendorName = $request->VendorName;
            $toll->VendorFather = $request->VendorFather;
            $toll->ShopName = $request->ShopName;
            $toll->MarketName = $request->MarketName;
            $toll->AreaName = $request->AreaName;
            $toll->Rate = $request->Rate;
            $toll->UserId = auth()->user()->id;
            $toll->save();

            $tp = new TollPayment;
            $tp->TollId = $toll->id;
            $tp->From = '2022-05-01';
            $tp->To = '2022-06-30';
            $tp->Rate = $request->Rate;
            $tp->Amount = 60 * $request->Rate;
            $tp->PmtMode = 'CASH';
            $tp->Days = '60';
            $tp->PaymentDate = date("Y-m-d");
            $tp->UserId = auth()->user()->id;
            $tp->save();
            return response()->json([
                'message' => 'Successfully Saved',
                'vendor_id' => $toll->id,
                'tran_id' => $tp->id,
                'vendor_name' => $toll->VendorName,
                'market_name' => $toll->MarketName,
                'area_name' => $toll->AreaName,
                'from' => $tp->From,
                'to' => $tp->To,
                'days' => $tp->Days,
                'rate' => $tp->Rate,
                'amount' => $tp->Amount,
            ], 200);
        } catch (Exception $e) {
            return response()->json($e, 400);
        }
    }

    /**
     * Repository for Get Tolls By ID
     */
    public function getToll($id)
    {
        $toll = Toll::where('id', $id)->get();
        $arr = array();
        if ($toll) {
            foreach ($toll as $tolls) {
                $val['id'] = $tolls->id ?? '';
                $val['VendorName'] = $tolls->VendorName ?? '';
                $val['VendorFather'] = $tolls->VendorFather ?? '';
                $val['ShopName'] = $tolls->ShopName ?? '';
                $val['MarketName'] = $tolls->MarketName ?? '';
                $val['AreaName'] = $tolls->AreaName ?? '';
                $val['Rate'] = $tolls->Rate ?? '';
                $val['LastPaymentDate'] = $tolls->LastPaymentDate ?? '';
                $val['LastAmount'] = $tolls->LastAmount ?? '';
                $val['UserId'] = $tolls->UserId ?? '';
                $val['created_at'] = $tolls->created_at ?? '';
                $val['updated_at'] = $tolls->updated_at ?? '';
                array_push($arr, $val);
            }
            return response()->json($arr, 200);
        } else {
            return response()->json(['Data Not Found for', 404]);
        }
    }

    /**
     * Get All Tolls
     */
    public function getAllToll()
    {
        $toll = Toll::orderBy('id', 'DESC')->get();
        $arr = array();
        if ($toll) {
            foreach ($toll as $tolls) {
                $val['id'] = $tolls->id ?? '';
                $val['VendorName'] = $tolls->VendorName ?? '';
                $val['VendorFather'] = $tolls->VendorFather ?? '';
                $val['ShopName'] = $tolls->ShopName ?? '';
                $val['MarketName'] = $tolls->MarketName ?? '';
                $val['AreaName'] = $tolls->AreaName ?? '';
                $val['Rate'] = $tolls->Rate ?? '';
                $val['UserId'] = $tolls->UserId ?? '';
                $val['created_at'] = $tolls->created_at ?? '';
                $val['updated_at'] = $tolls->updated_at ?? '';
                array_push($arr, $val);
            }
            return response()->json($arr, 200);
        } else {
            return response()->json(['Data Not Found', 404]);
        }
    }

    /**
     * Get Toll Location By Area
     * @param AreaName $area
     */
    public function getTollLocation()
    {
        $location = DB::select(
            "select distinct
                id,
                AreaName,
                Location,
                concat(AreaName,', ',Location)
                as AreaLocation
                from tolls"
        );
        return response()->json($location, 200);
    }

    /**
     * Get Vendor Details by Ids
     * @param id $id
     */
    public function getVendorDetailsByArea(Request $request)
    {
        $request->validate([
            'AreaName' => 'required',
            'Location' => 'required',
        ]);
        $details = Toll::select('id', 'ShopNo', 'ShopType', 'AreaName', 'VendorName', 'Address', 'Location', 'LastPaymentDate', 'LastAmount')
            ->where('AreaName', '=', $request->AreaName)
            ->where('Location', '=', $request->Location)
            ->orderByDesc('id')
            ->get();
        return response()->json($details, 200);
    }

    /**
     * Toll Payment (Version 2)
     */
    public function tollPayment(Request $request, $id)
    {
        $request->validate([
            'To' => 'required',
        ]);

        try {
            $toll = Toll::find($id);
            $mLastPaymentDate = $toll->LastPaymentDate;
            if (!$mLastPaymentDate) {
                return response()->json('This shop has no Last Payment Date', 400);
            }
            if ($mLastPaymentDate) {
                $create = date_create($request->To);
                $format = date_format($create, "Y-m-d");
                if ($format > $mLastPaymentDate) {
                    $Rate = $toll->Rate;
                    $toll->UserId = auth()->user()->id;

                    $tp = new TollPayment;
                    $tp->TollId = $toll->id;
                    $From = date_create($mLastPaymentDate);
                    $tp->From = date_format($From, 'Y-m-d');
                    $To = date_create($request->To);
                    $tp->To = date_format($To, 'Y-m-d');
                    $tp->Rate = $Rate;
                    // Calculating Days
                    $interval = date_diff($From, $To);
                    $tp->Days = $interval->format("%a");

                    // Calculating Amount
                    $Rate = $toll->Rate;
                    $tp->Amount = $tp->Days * $Rate;
                    $toll->LastAmount = $tp->Days * $Rate;

                    $tp->PmtMode = 'CASH';
                    $tp->PaymentDate = date("Y-m-d H:i:s");
                    $tp->UserId = auth()->user()->id;

                    $toll->save();
                    $tp->save();
                    return response()->json([
                        'message' => 'Successfully Saved',
                        'vendor_id' => $toll->id,
                        'tran_id' => $tp->id,
                        'vendor_name' => $toll->VendorName,
                        'location_name' => $toll->Location,
                        'area_name' => $toll->AreaName,
                        'from' => $tp->From,
                        'to' => $tp->To,
                        'days' => $tp->Days,
                        'rate' => $tp->Rate,
                        'amount' => $tp->Amount,
                    ], 200);
                } else {
                    return response()->json('Date Should be after the Last Payment Date', 400);
                }
            }

        } catch (Exception $e) {
            return response($e, 400);
        }
    }

    /**
     * Save Tolls
     */
    public function saveToll(Request $request)
    {
        $request->validate([
            'VendorName' => 'required',
        ]);
        // dd($request->all());
        try {
            $toll = new Toll;
            $toll->Allotee = $request->Allotee;
            $toll->ShopNo = $request->ShopNo;
            $toll->ShopType = $request->ShopType;
            $toll->AreaName = $request->AreaName;
            $toll->VendorName = $request->VendorName;
            $toll->Address = $request->Address;
            $toll->Rate = $request->Rate;

            $lPaymentDate = date_create($request->LastPaymentDate);
            $toll->LastPaymentDate = date_format($lPaymentDate, "Y-m-d");

            $toll->Location = $request->Location;
            $toll->NoOfFloors = $request->NoOfFloors;
            $toll->PresentOccupier = $request->PresentOccupier;
            $toll->TradeLicense = $request->TradeLicense;
            $toll->Construction = $request->Construction;
            $toll->ConstructionType = $request->ConstructionType;
            $toll->SalePurchase = $request->SalePurchase;
            $toll->ContactNo = $request->ContactNo;
            $toll->Remarks = $request->Remarks;
            $toll->PhotographLocation = $request->PhotographLocation;
            $toll->UserId = auth()->user()->id;
            $toll->save();
            return response()->json('Successfully Saved The Toll', 200);
        } catch (Exception $e) {
            return response()->json($e, 400);
        }

    }

    /**
     * Update Toll
     */
    public function updateToll(Request $request, $id)
    {
        try {
            $toll = Toll::find($id);
            $toll->Rate = $request->Rate;
            $mDate = date_create($request->LastPaymentDate);
            $toll->LastPaymentDate = date_format($mDate, "Y-m-d");
            $toll->save();
            return response()->json('Successfully Updated', 200);
        } catch (Exception $e) {
            return response()->json($e, 400);
        }
    }
}
