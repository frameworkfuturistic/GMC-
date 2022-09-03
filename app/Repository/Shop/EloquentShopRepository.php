<?php

namespace App\Repository\Shop;

use App\Http\Requests\ShopRequest;
use App\Models\Shop;
use App\Models\ShopPayment;
use App\Models\surveyLogin;
use App\Repository\Shop\ShopRepository;
use App\Traits\AppHelper;
use App\Traits\Shop as ShopTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Created On-04-07-2022
 * Created By-Anshu Kumar
 * Repository for Saving Editing Bills and Payments for Shops
 *
 */

class EloquentShopRepository implements ShopRepository
{

    use AppHelper;
    use ShopTrait;

    public function __construct()
    {
        $this->menuApp();
    }

    /**
     * function for View of the Shop and Shop Details
     */

    public function shopMasterView()
    {
        $shop = Shop::orderBy('id', 'DESC')->get();
        $array = [
            'parents' => $this->parent,
            'childs' => $this->child,
            'shops' => $shop,
        ];
        return view('admin.Shops.details-view')->with($array);
    }

    /**
     * Function for Shop Summary View Purpose
     */
    public function shopSummaryView()
    {
        $stmQuery = "select sum(Amount) as today_collection from toll_payments where PaymentDate=CURDATE();";
        $today_toll_total = DB::select($stmQuery);

        $stmQuery1 = "select sum(Amount) as today_collection from shop_payments where PaymentDate=CURDATE();";
        $today_shop_total = DB::select($stmQuery1);
        $array = [
            'parents' => $this->parent,
            'childs' => $this->child,
            'today_total_toll' => $today_toll_total[0]->today_collection,
            'today_total_shop' => $today_shop_total[0]->today_collection,
        ];
        return view('admin.Shops.summary-view')->with($array);
    }

    /**
     * | Shop Bill Payment View
     */
    public function billPaymentView()
    {
        $user = surveyLogin::select('id', 'name')->get();
        $array = [
            'parents' => $this->parent,
            'childs' => $this->child,
            'users' => $user
        ];
        return view('admin.Shops.bill-payment-view')->with($array);
    }

    /**
     * | Post Bill Payments
     * | Generating Shop Payment for pending Paid Shops
     * | @param Request $request
     * | @var shops the shop id for the requested shop No
     * | @var shopPayment created a new object for inserting Payment 
     */
    public function postBillPayment(Request $request)
    {
        $request->validate([
            'shopNo' => 'required',
            'amount' => 'required|integer',
            'from' => 'required',
            'to' => 'required',
            'rate' => 'required|integer',
            'paymentDate' => 'required'
        ]);
        try {
            DB::beginTransaction();
            $generatedFrom = formatDate($request->from);
            $generatedTo = formatDate($request->to);
            $generatedPaymentDate = formatDate($request->paymentDate);
            $paidFrom = ($generatedFrom->format('Y') * 12) + $generatedFrom->format('m');   // Payment From
            $paidTo = ($generatedTo->format('Y') * 12) + $generatedTo->format('m');         // Payment To
            $months = $paidTo - $paidFrom;

            // Finding The ShopID
            $shop = Shop::select('id')->where('ShopNo', $request->shopNo)->first();

            if (!$shop) {
                DB::rollBack();
                return back()->with('message', 'Shop Not Found for this Shop ID');
            }

            // Shop Payment
            $shopPayment = new ShopPayment();
            $shopPayment->ShopId = $shop->id;
            $shopPayment->PaidFrom = $paidFrom;
            $shopPayment->PaidTo = $paidTo;
            $shopPayment->Demand = $request->amount;
            $shopPayment->Amount = $request->amount;
            $shopPayment->PmtMode = 'CASH';
            $shopPayment->Rate = $request->rate;
            $shopPayment->Months = $months;
            $shopPayment->PaymentDate = $request->paymentDate;
            $shopPayment->UserId = $request->collectedBy;

            // Photo Upload
            if ($file = $request->file('photoUpload')) {
                $ext = $file->getClientOriginalExtension();
                if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png') {
                    $fileName = $request->shopNo . '-' . time() . '.' . $ext;
                    $shopPayment->PhotoPath = $fileName;
                    $year = $generatedPaymentDate->format('Y');
                    $file->move('UploadReceipts/' . $year, $fileName);
                } else {
                    DB::rollBack();
                    return response()->json(['Error', 'File Name must be in png, jpg or jpeg']);
                }
            }

            $shopPayment->CreatedBy = auth()->user()->id;
            $shopPayment->Remarks = $request->remarks;
            $shopPayment->save();
            DB::commit();
            return back()->with('message', 'Payment Done Successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return $e;
        }
    }

    /**
     * Save Shops
     */
    public function saveShops(ShopRequest $request)
    {
        $shop = new shop;
        $this->storing($shop, $request);
        return response()->json('Successfully Saved the Shop', 200);
    }

    /**
     * Edit Shops
     */
    public function editShops(Request $request, $id)
    {
        $shop = Shop::find($id);
        $this->storing($shop, $request);
        return response()->json('Successfully Updated the Shop', 200);
    }

    /**
     * Get Shop by id
     * @param shopid $id
     */
    public function getShopByID($id)
    {
        $strSql = "
        SELECT 
            s.ID, 
            s.ShopNo,
            s.Allottee,
            s.Circle,
            s.Market, 
            s.Address,
            s.Rate, 
            s.Arrear,
            s.AllottedLength,
            s.AllottedBreadth,
            s.Area,
            s.NoOfFloors,
            s.PresentOccupier,
            s.ContactNo,
            monthyear(p.PaidFrom) as PaidFrom,
            monthyear(p.PaidTo) as PaidTo,
            p.Demand as LastDemand,
            p.Amount AS LastPaymentAmount,
            p.PmtMode AS LastPmtMode,
            p.Rate AS LastRate,
            p.Months AS LastMonths,
            DATE_format(ifnull(p.created_at,'2022-04-30'),'%Y-%m-%d') AS LastPaymentDate,
        	DATE_format(p.created_at,'%h:%m %p') AS LastPaymentTime,
	        l.name AS LastCreatedBy,
	        l.mobile AS LastUserMobile
        FROM shops s
        LEFT JOIN shop_payments p ON s.LastTranID=p.ID
        LEFT JOIN survey_logins l ON p.UserId=l.id
        WHERE s.id = $id ORDER BY s.Allottee";

        $shop = DB::select($strSql);
        $arr = array();
        foreach ($shop as $shops) {
            // $created_at = $shops->created_at == null ? '' : date_format(date_create($shops->created_at), 'd-m-Y');
            $val['ShopID'] = $shops->ID ?? '';
            $val['ShopNo'] = $shops->ShopNo ?? '';
            $val['Allottee'] = $shops->Allottee ?? '';
            $val['Circle'] = $shops->Circle ?? '';
            $val['Market'] = $shops->Market ?? '';
            $val['Address'] = $shops->Address ?? '';
            $val['Rate'] = $shops->Rate ?? '';
            $val['Arrear'] = $shops->Arrear ?? '';
            $val['AllottedLength'] = $shops->AllottedLength ?? '';
            $val['AllottedBreadth'] = $shops->AllottedBreadth ?? '';
            $val['Area'] = $shops->Area ?? '';
            $val['NoOfFloors'] = $shops->NoOfFloors ?? '';
            $val['PresentOccupier'] = $shops->PresentOccupier ?? '';
            $val['ContactNo'] = $shops->ContactNo ?? '';
            $val['PaidFrom'] = $shops->PaidFrom ?? '';
            $val['PaidTo'] = $shops->PaidTo ?? '';
            $val['LastDemand'] = $shops->LastDemand ?? '';
            $val['LastPaymentAmount'] = $shops->LastPaymentAmount ?? '';
            $val['LastPmtMode'] = $shops->LastPmtMode ?? '';
            $val['LastRate'] = $shops->LastRate ?? '';
            $val['LastPaymentDate'] = $shops->LastPaymentDate ?? '';
            $val['LastPaymentTime'] = $shops->LastPaymentTime ?? '';
            $val['LastCreatedBy'] = $shops->LastCreatedBy ?? '';
            $val['LastUserMobile'] = $shops->LastUserMobile ?? '';
            array_push($arr, $val);
            return response()->json($arr, 200);
        }
    }

    /**
     * Get All Shops
     * @return Shops
     */

    public function getAllshops()
    {
        $shop = Shop::orderBy('id', 'DESC')->get();
        $arr = array();
        if ($shop) {
            foreach ($shop as $shops) {
                $val['id'] = $shops->ID ?? '';
                $val['Circle'] = $shops->Circle ?? '';
                $val['Market'] = $shops->Market ?? '';
                $val['Allottee'] = $shops->Allottee ?? '';
                $val['ShopNo'] = $shops->ShopNo ?? '';
                $val['Rate'] = $shops->Rate ?? '';
                $val['LastPaymentDate'] = $shops->LastPaymentDate ?? '';
                $val['LastAmount'] = $shops->LastAmount ?? '';
                $val['created_at'] = $shops->created_at ?? '';
                $val['updated_at'] = $shops->updated_at ?? '';
                array_push($arr, $val);
            }
            return response()->json($arr, 200);
        } else {
            return response()->json(['Data Not Found', 404]);
        }
    }

    /**
     * Get Circle list of shops
     */
    public function getShopCircle()
    {
        $circle = Shop::select('Circle')
            ->distinct()
            ->get();
        return $circle;
    }

    /**
     * Get Shop Circle wise Market
     */
    public function getShopCircleMarket()
    {
        $location = DB::select(
            "select distinct
                Circle,
                Market,
                concat(Circle,', ',Market)
                as CircleMarket
                from shops"
        );
        return response()->json($location, 200);
    }

    /**
     * Get Shop Details By Circle and Market Wise
     */
    public function getShopDetailsByCircle(Request $request)
    {
        $request->validate([
            'Circle' => 'required',
            'Market' => 'required',
        ]);

        $strSql = "SELECT 
                s.ID, 
                s.ShopNo,
                s.Allottee,
                s.Circle,
                s.Market, 
                s.Rate, 
                s.Arrear,
                monthyear(p.PaidFrom) as PaidFrom,
                monthyear(p.PaidTo) as PaidTo,
                p.Amount AS LastPaymentAmount,
                p.PmtMode AS LastPmtMode,
                p.Rate AS LastRate,
                p.Months AS LastMonths,
                p.created_at AS LastPaymentDate,
                l.name AS LastCreatedBy
            FROM shops s
            LEFT JOIN shop_payments p ON s.LastTranID=p.Id
            LEFT JOIN survey_logins l ON p.UserId=l.id
            WHERE s.Circle= '$request->Circle' AND s.Market='$request->Market' ORDER BY s.Allottee";

        $shop = DB::select($strSql);

        // $shop = Shop::select('ID', 'Circle', 'Market', 'Allottee', 'ShopNo', 'Rate', 'created_at', 'updated_at')
        //     ->where('Circle', '=', $request->Circle)
        //     ->where('Market', '=', $request->Market)
        //     ->orderByDesc('ID')
        //     ->get();

        $arr = array();
        if ($shop) {
            foreach ($shop as $shops) {
                $val['id'] = $shops->ID ?? '';
                $val['ShopNo'] = $shops->ShopNo ?? '';
                $val['Allottee'] = $shops->Allottee ?? '';
                $val['Circle'] = $shops->Circle ?? '';
                $val['Market'] = $shops->Market ?? '';
                $val['Rate'] = $shops->Rate ?? '';
                $val['Arrear'] = $shops->Arrear ?? '';
                $val['PaidFrom'] = $shops->PaidFrom ?? '';
                $val['PaidTo'] = $shops->PaidTo ?? '';
                $val['LastPaymentAmount'] = $shops->LastPaymentAmount ?? '';
                $val['LastPmtMode'] = $shops->LastPmtMode ?? '';
                $val['LastRate'] = $shops->LastRate ?? '';
                $val['LastMonths'] = $shops->LastMonths ?? '';
                $val['LastPaymentDate'] = $shops->LastPaymentDate ?? '';
                $val['LastCreatedBy'] = $shops->LastCreatedBy ?? '';
                array_push($arr, $val);
            }
            return response()->json($arr, 200);
        } else {
            return response()->json(['Data Not Found', 404]);
        }
    }

    /**
     * Function to convert int to Month and Year
     */
    function funMonthYear($val)
    {
        $retStr = '';
        $tmpYear =  floor($val / 12);
        $tmpMnth = $val % 12;
        $tmpMnth;

        switch ($tmpMnth) {
            case 0:
                $retStr = 'Dec, ' . ($tmpYear - 1);
                break;
            case 1:
                $retStr = 'Jan, ' . ($tmpYear);
                break;
            case 2:
                $retStr = 'Feb, ' . ($tmpYear);
                break;
            case 3:
                $retStr = 'Mar, ' . ($tmpYear);
                break;
            case 4:
                $retStr = 'Apr, ' . ($tmpYear);
                break;
            case 5:
                $retStr = 'May, ' . ($tmpYear);
                break;
            case 6:
                $retStr = 'Jun, ' . ($tmpYear);
                break;
            case 7:
                $retStr = 'Jul, ' . ($tmpYear);
                break;
            case 8:
                $retStr = 'Aug, ' . ($tmpYear);
                break;
            case 9:
                $retStr = 'Sep, ' . ($tmpYear);
                break;
            case 10:
                $retStr = 'Oct, ' . ($tmpYear);
                break;
            case 11:
                $retStr = 'Nov, ' . ($tmpYear);
                break;
            default:
                $retStr = '';
        }
        return $retStr;
    }


    /**
     * Shop Payments
     */
    public function shopPayment(Request $request, $id)
    {
        /**
         * FIND SHOP 
         * ==============================================================
         * --Find #LastTranID = LastTranID
         * --#Rate = Rate
         * --#Arrear = Arrear
         * 
         * FIND SHOP_PAYMENTS
         * ==============================================================
         * --#PaidUpto = PaidTo; [if not found make it April 2022]
         * CALCULATE
         * ================================================================
         * --#From = #PaidUpto + 1
         * --#To = (year(Request->To) * 12) + month(Request->To)
         * --#Months = (#From - #To) + 1
         * --#Demand = #Months * #Rate
         * --#NetDemand = #Demand + #Arrear
         * --#Due = #NetDemand - Request->amount
         * 
         * UPDATE SHOP PAYMENTS
         * ================================================================
         * --ShopID = request->id
         * --PaidFrom = #From
         * --PaidTo = #To
         * --Amount = Request->amount
         * --PmtMode = 'CASH'
         * --Rate = #Rate
         * --Months = #Months
         * --PaymentDate = now()
         * --UserID = Auth->id
         * --#TranID = LastTranID
         * 
         * UPDATE SHOP
         * ================================================================
         * --Arrear = #Due
         * --LastPaymentDate = now();
         * --LastTranID = #TranID
         * 
         * -------------------------------------------------------------------
         * DATABASE FUNCTION TO BE CREATED
         * ===================================================================
         * DELIMITER $$
         *
         * DROP FUNCTION IF EXISTS `monthyear` $$
         * CREATE FUNCTION `monthyear` (val INT) RETURNS VARCHAR(20)
         * DETERMINISTIC
         * BEGIN
         *   DECLARE retVal VARCHAR(20);
         *   DECLARE tmpYear INT;
         *   DECLARE tmpMnth INT;
         *
         *   SET tmpYear = floor(val/12);
         *   SET tmpMnth = val%12;
         *
         *   IF tmpMnth = 0 THEN SET retVal=concat('Dec, ',cast(tmpYear-1 as char));
         *   ELSEIF tmpMnth = 1 THEN SET retVal=concat('Jan, ',cast(tmpYear as char));
         *   ELSEIF tmpMnth = 2 THEN SET retVal=concat('Feb, ',cast(tmpYear as char));
         *   ELSEIF tmpMnth = 3 THEN SET retVal=concat('Mar, ',cast(tmpYear as char));
         *   ELSEIF tmpMnth = 4 THEN SET retVal=concat('Apr, ',cast(tmpYear as char));
         *   ELSEIF tmpMnth = 5 THEN SET retVal=concat('May, ',cast(tmpYear as char));
         *   ELSEIF tmpMnth = 6 THEN SET retVal=concat('Jun, ',cast(tmpYear as char));
         *   ELSEIF tmpMnth = 7 THEN SET retVal=concat('Jul, ',cast(tmpYear as char));
         *   ELSEIF tmpMnth = 8 THEN SET retVal=concat('Aug, ',cast(tmpYear as char));
         *   ELSEIF tmpMnth = 9 THEN SET retVal=concat('Sep, ',cast(tmpYear as char));
         *   ELSEIF tmpMnth = 10 THEN SET retVal=concat('Oct, ',cast(tmpYear as char));
         *   ELSEIF tmpMnth = 11 THEN SET retVal=concat('Nov, ',cast(tmpYear as char));
         *   ELSE SET retVal='';
         *   END IF;
         *
         *   RETURN retVal;
         *
         *
         * END $$
         *
         * DELIMITER ;
         */
        $request->validate([
            'To' => 'required',
            'Amount' => 'required|numeric|between:10,10000'
        ]);

        DB::beginTransaction();
        try {
            //* FIND SHOP 
            $shop = Shop::find($id);
            $refRate = $shop->Rate;
            $refArrear = $shop->Arrear;
            //* --Find #LastTranID = LastTranID
            $refTranID = $shop->LastTranID;

            //* --#PaidUpto = PaidTo; [if not found make it April 2022]
            $refPaidUpto = 24268; // April 2022
            if ($refTranID != null) {
                $oldShopPayments = ShopPayment::find($refTranID);
                $refPaidUpto = $oldShopPayments->PaidTo;
            }
            //CALCULATION
            $paidFrom = $refPaidUpto + 1;
            // $generatedDate = date_create($request->To);
            $generatedDate = date_create_from_format("d-m-Y", $request->To);
            $paidTo = ($generatedDate->format('Y') * 12) + $generatedDate->format('m');
            if ($refPaidUpto >=  $paidTo) {
                DB::rollBack();
                return response()->json('This shop has no Last Payment Date', 400);
            }
            $months = ($paidTo - $paidFrom) + 1;
            $demand = $months * $refRate;
            $netDemand = $demand + $refArrear;
            $due = doubleval($netDemand) - doubleval($request->Amount);

            //Add Record in ShopPayment table
            $sp = new ShopPayment;
            $sp->ShopId = $id;
            $sp->PaidFrom = $paidFrom;
            $sp->PaidTo = $paidTo;
            $sp->Demand = $netDemand;
            $sp->Amount = $request->Amount;
            $sp->PmtMode = 'CASH';
            $sp->Rate = $refRate;
            $sp->Months = $months;
            $sp->PaymentDate = date("Y-m-d H:i:s");
            $sp->UserId = auth()->user()->id;
            $sp->save();

            //SAVE SHOP TABLE
            $shop->LastTranID = $sp->id;
            $shop->Arrear = $due;
            $shop->save();
            DB::commit();

            return $this->getShopByID($id);

            // $query = DB::select("
            //         select * from survey_logins where id='$shop->UserId'
            //         ");
            // return response()->json([
            //     'message' => 'Payment Successful',
            //     'ShopNo' => $shop->ShopNo,
            //     'circle' => $shop->Circle,
            //     'Market' => $shop->Market,
            //     'shop_id' => $shop->ID,
            //     'shop_no' => $shop->ShopNo,
            //     'present_occupier' => $shop->PresentOccupier,
            //     'contact_no' => $shop->ContactNo,
            //     'tran_id' => $sp->id,
            //     'from' => $this->funMonthYear($paidFrom),
            //     'to' => $this->funMonthYear($paidTo),
            //     'daily_shop_fee' => $refRate,
            //     'months' => $months,
            //     'amount' => $request->Amount,
            //     'tax_collector_name' => $query[0]->name,
            //     'tax_collector_mobile' => $query[0]->mobile,
            // ], 200);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json($e, 400);
        }
    }

    // /**
    //  * Shop Payments
    //  */
    // public function shopPayment(Request $request, $id)
    // {
    //     $request->validate([
    //         'To' => 'required',
    //         'Amount' => 'required|numeric|between:10,10000'
    //     ]);

    //     try {
    //         $shop = Shop::find($id);
    //         $mLastPaymentDate = $shop->LastPaymentDate;
    //         if (!$mLastPaymentDate) {
    //             return response()->json('This shop has no Last Payment Date', 400);
    //         }
    //         if ($mLastPaymentDate) {
    //             $create = date_create($request->To);
    //             $format = date_format($create, "Y-m-d");
    //             if ($format > $mLastPaymentDate) {
    //                 $Rate = $shop->Rate;
    //                 $shop->UserId = auth()->user()->id;

    //                 $arrear =  is_null($shop->Arrear) ? 0 : $shop->Arrear;

    //                 $sp = new ShopPayment;
    //                 $sp->ShopId = $shop->ID;

    //                 $From = date_create($mLastPaymentDate);
    //                 $sp->From = date_format($From, 'Y-m-d');
    //                 $sp_from = date_format($From, 'M-Y');
    //                 $To = date_create($request->To);
    //                 $sp->To = date_format($To, 'Y-m-d');
    //                 $sp_to = date_format($To, 'M-Y');
    //                 $sp->Rate = $Rate;
    //                 // Calculating Months
    //                 $interval = date_diff($From, $To);
    //                 $sp->Months = $interval->format("%m") + 1;

    //                 // Calculating Amount
    //                 $Rate = $shop->Rate;
    //                 $demand = $sp->Months * $Rate;
    //                 $net_demand = $demand + $arrear;

    //                 $sp->Amount = $request->Amount;

    //                 $shop->Arrear = $net_demand - $request->Amount;
    //                 $shop->LastAmount = $request->Amount;
    //                 $shop->LastPaymentDate = $sp->To;

    //                 $sp->PmtMode = 'CASH';
    //                 $sp->PaymentDate = date("Y-m-d H:i:s");
    //                 $sp->UserId = auth()->user()->id;

    //                 $shop->save();
    //                 $sp->save();

    //                 $query = DB::select("
    //                 select * from survey_logins where id='$shop->UserId'
    //                 ");
    //                 return response()->json([
    //                     'message' => 'Payment Successful',
    //                     'circle' => $shop->Circle,
    //                     'Market' => $shop->Market,
    //                     'shop_id' => $shop->ID,
    //                     'shop_no' => $shop->ShopNo,
    //                     'present_occupier' => $shop->PresentOccupier,
    //                     'contact_no' => $shop->ContactNo,
    //                     'tran_id' => $sp->id,
    //                     'from' => $sp_from,
    //                     'to' => $sp_to,
    //                     'daily_shop_fee' => $sp->Rate,
    //                     'months' => $sp->Months,
    //                     'amount' => $sp->Amount,
    //                     'tax_collector_name' => $query[0]->name,
    //                     'tax_collector_mobile' => $query[0]->mobile,
    //                 ], 200);
    //             } else {
    //                 return response()->json('Date Should be after the Last Payment Date', 400);
    //             }
    //         }
    //     } catch (Exception $e) {
    //         return response()->json($e, 400);
    //     }
    // }

    /**
     * Total Shop Collection Amount Between Dates
     */
    public function totalShopCollection(Request $request)
    {
        $strQuery = "select sum(Amount) as collection from shop_payments
                     where PaymentDate between DATE_FORMAT('$request->ShopFrom','%Y-%m-%d') and DATE_FORMAT('$request->ShopTo','%Y-%m-%d')";
        $total = DB::select($strQuery);
        return $total[0]->collection;
    }
}
