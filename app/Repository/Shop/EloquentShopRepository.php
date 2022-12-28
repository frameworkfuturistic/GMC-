<?php

namespace App\Repository\Shop;

use App\Exports\ShopExport;
use App\Http\Requests\ShopRequest;
use App\Models\Shop;
use App\Models\ShopMasterLog;
use App\Models\ShopOldArrear;
use App\Models\ShopPayment;
use App\Models\ShopPaymentLog;
use App\Models\surveyLogin;
use App\Repository\Shop\ShopRepository;
use App\Traits\AppHelper;
use App\Traits\Shop as ShopTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

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

    public function __construct($roleID)
    {
        $this->menuApp($roleID);
    }

    /**
     * function for View of the Shop and Shop Details
     */

    public function shopMasterView(Request $req)
    {
        if ($req->ajax()) {
            $shop = Shop::select('ID', 'ShopNo', 'Circle', 'Allottee', 'Rate', 'Arrear', 'Address', 'ContactNo', 'Longitude', 'Latitude')
                ->latest()
                ->get();
            return Datatables::of($shop)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $link = "shops/shop-update-view/" . $row['ID'];
                    $btn = "<a class='btn btn-success btn-sm' href='$link' class='edit btn btn-primary btn-sm'>
                            <i class='icon-pen'></i> Update
                        </a>";

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $array = [
            'parents' => $this->parent,
            'childs' => $this->child,
        ];
        return view('admin.Shops.details-view')->with($array);
    }

    /**
     * Function for Shop Summary View Purpose
     */
    public function shopSummaryView()
    {
        $stmQuery = "select sum(Amount) as today_collection from toll_payments where PaymentDate=CURDATE() AND IsActive=1;";
        $today_toll_total = DB::select($stmQuery);

        $stmQuery1 = "select sum(Amount) as today_collection from shop_payments where PaymentDate=CURDATE() AND IsActive=1;";
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
            'amount' => 'required|numeric',
            'from' => 'required',
            'to' => 'required',
            'rate' => 'required|numeric',
            'paymentDate' => 'required'
        ]);
        try {
            DB::beginTransaction();
            // return date_create($request->to)->format('Y');
            $generatedFrom = date_create($request->from);
            $generatedTo = date_create($request->to);
            $generatedPaymentDate = date_create($request->paymentDate);
            $paidFrom = ($generatedFrom->format('Y') * 12) + $generatedFrom->format('m');   // Payment From
            $paidTo = ($generatedTo->format('Y') * 12) + $generatedTo->format('m');         // Payment To
            $months = ($paidTo - $paidFrom) + 1;

            // Finding The ShopID
            $shop = Shop::where('ShopNo', $request->shopNo)->first();

            if (!$shop) {
                DB::rollBack();
                return back()->with('message', 'Shop Not Found for this Shop ID');
            }

            // Shop Payment
            $shopPayment = new ShopPayment();
            $shopPayment->ShopId = $shop->ID;
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
                    $year = $generatedPaymentDate->format('Y');
                    $fileName = $year . '/' . $request->shopNo . '-' . time() . '.' . $ext;
                    $shopPayment->PhotoPath = $fileName;
                    $file->move('UploadReceipts/' . $year, $fileName);
                } else {
                    DB::rollBack();
                    return response()->json(['Error', 'File Name must be in png, jpg or jpeg']);
                }
            }

            $shopPayment->CreatedBy = auth()->user()->id;
            $shopPayment->Remarks = $request->remarks;
            $shopPayment->save();
            // Creating Log
            $log = new ShopPaymentLog();
            $log->shop_payment_id = $shop->LastTranID;
            $log->new_shop_payment_id = $shopPayment->id;
            $log->ip_address = $request->ip();
            $log->save();

            // Update Last TranID for Shop
            $shop->LastTranID = $shopPayment->id;
            $shop->Arrear = $request->due;
            $shop->Rate = $request->rate;
            $shop->save();

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

    // Get shop update view
    public function shopUpdateView($id)
    {
        $shops = Shop::find($id);
        $array = [
            'parents' => $this->parent,
            'childs' => $this->child,
            'shop' => $shops
        ];
        return view('admin.Shops.shop-update-view')->with($array);
    }

    /**
     * Edit Shops
     */
    public function editShops(Request $request)
    {
        $request->validate([
            "rate" => "numeric|required"
        ]);
        DB::beginTransaction();
        try {
            $shop = Shop::find($request->id);
            $userId = auth()->user()->id;
            // Creating Logs
            $log = new ShopMasterLog();
            $log->shop_id = $shop->ID;
            $log->allottee = $shop->Allottee;
            $log->rate = $shop->Rate;
            $log->user_id = $userId;
            $log->save();

            $shop->Allottee = $request->allottee;
            $shop->Rate = $request->rate;
            $shop->save();
            DB::commit();
            return back()->with('message', 'Successfully Updated the Shop');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
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

            p.PaidFrom as PaidFromN,
            p.PaidTo as PaidToN,

            p.Demand as LastDemand,
            p.Amount AS LastPaymentAmount,
            p.PmtMode AS LastPmtMode,
            p.Rate AS LastRate,
            p.Months AS LastMonths,
            DATE_format(ifnull(p.PaymentDate,'2022-04-30'),'%Y-%m-%d') AS LastPaymentDate,
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

            $val['PaidFromN'] = $shops->PaidFromN ?? '';
            $val['PaidToN'] = $shops->PaidToN ?? '';

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
            'Amount' => 'required|numeric|between:1,30000'
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
                return response()->json('This shop has no Last Payment Date', 200);
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
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json($e, 400);
        }
    }

    /**
     * Total Shop Collection Amount Between Dates
     */
    public function totalShopCollection(Request $request)
    {
        $userType = auth()->user()->user_type;
        $strQuery = "SELECT 
                    $userType AS userType,
                    p.id AS PaymentID,
                    s.ShopNo,
                    s.Circle,
                    s.Allottee,
                    monthyear(p.PaidFrom) AS PaidFrom,
                    monthyear(p.PaidTo) AS PaidTo,
                    p.Amount,
                    p.Rate,
                    p.Months,
                    DATE_FORMAT(p.PaymentDate,'%d-%b-%y') AS PaymentDate,
                    l.name AS TaxCollector
                    
                    FROM shop_payments p
                    INNER JOIN shops s ON s.ID=p.ShopId
                    INNER JOIN survey_logins l ON l.id=p.UserId
                    WHERE p.PaymentDate BETWEEN DATE_FORMAT('$request->ShopFrom','%Y-%m-%d') AND DATE_FORMAT('$request->ShopTo','%Y-%m-%d') AND p.IsActive=1";
        $collectionSummary = DB::select($strQuery);
        return $collectionSummary;
    }

    /**
     * | Export the all shop data to excel
     */
    public function exportToExcel()
    {
        return Excel::download(new ShopExport, 'shops.xlsx');
    }

    /**
     * | Activation and Deactivation for shop Payment
     */
    public function activationOrDeactivationPayment(Request $req, $id)
    {
        DB::beginTransaction();
        try {
            // Getting first the Shop Payment ID
            $shopPayment = ShopPayment::find($id);

            // Fetching Last Transactions from shop_payments
            if ($req->shopToggle == "true") {
                $shopPayment->IsActive = 0;
                $colString = "deactivated_by";
                $msg = ['message' => 'Successfully Deactivated The Transaction'];
            }
            if ($req->shopToggle == "false") {
                $shopPayment->IsActive = 1;
                $colString = "activated_by";
                $msg = ['message' => 'Successfully Activated The Transaction'];
            }
            $shopPayment->CreatedBy = auth()->user()->id;
            $shopPayment->save();

            // Creating Activation or Deactivation Log
            $log = new ShopPaymentLog();
            $log->new_shop_payment_id = $shopPayment->id;
            $log->ip_address = $req->ip();
            $log->$colString = auth()->user()->id;
            $log->save();

            // Update Last Payment Transaction ID for Shops
            $lastTranQuery = "SELECT * FROM shop_payments 
                            WHERE shopid=$shopPayment->ShopId
                            AND IsActive='1'
                            ORDER BY id DESC
                            LIMIT 1";

            $updateTran = DB::select($lastTranQuery);
            $updatedTranID = $updateTran[0]->id;
            $shop = Shop::find($shopPayment->ShopId);
            $shop->LastTranID = $updatedTranID;
            $shop->save();

            DB::commit();
            return response()->json($msg);
        } catch (Exception $e) {
            DB::rollBack();
            return $e;
        }
    }

    /**
     * | Initialization
     * ----------------------------------------------------------------
     * @var demand the generated demand
     * @var amount the amount to be paid by shop owner
     * @var shop the shop details by shop id
     * @var oldArrear new Arrear to be append on ShopOldArrear table
     * | Calculation 
     * ----------------------------------------------------------------
     * @var remainingArrear = @var demand - @var amount
     */
    public function shopOldArrear($req)
    {
        $req->validate([
            'shopId' => 'required',
            'amount' => 'required',
            'demand' => 'required'
        ]);
        try {
            DB::beginTransaction();
            $demand = $req->demand;
            $amount = $req->amount;

            $shop = Shop::find($req->shopId);

            if ($shop->OldArrear == 0 || $shop->OldArrear < 0) {
                return response()->json([true, "This Shop has no remaining old arrear", ""]);
            }

            $oldArrear = new ShopOldArrear();
            $oldArrear->shop_id = $shop->ID;
            $oldArrear->demand = $req->demand;
            $oldArrear->amount = $req->amount;
            $oldArrear->collected_by = auth()->user()->id;
            $oldArrear->save();

            // Updating shop old arrear
            $remainingArrear = $demand - $amount;
            $shop->OldArrear = $remainingArrear;
            $shop->save();

            DB::commit();
            return response()->json([true, "Payment Successfully Done", "Remaining Arrear $remainingArrear"]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([false, $e->getMessage(), ""]);
        }
    }

    /**
     * | View for Tc Collections
     */
    public function tcCollectionsView()
    {
        $todayDate = Carbon::now()->format('Y-m-d');
        $metaReqs = [
            'from' => $todayDate,
            'to' => $todayDate
        ];
        $req = new Request($metaReqs);
        $todayCollections = $this->getTcCollections($req);
        $array = [
            'parents' => $this->parent,
            'childs' => $this->child,
            'todayCollections' => $todayCollections
        ];
        return view('admin.Shops.tc-collections')->with($array);
    }

    /**
     * | Get TC Collections by Date
     */
    public function getTcCollections($req)
    {
        $mQuery = "SELECT
                        s.UserId,
                        l.name,
                        l.mobile,
                        l.designation,
                        l.gender,
                        ifnull(SUM(Amount),0) AS collection
                        FROM (SELECT id,Userid,Amount,PaymentDate from shop_payments
                                UNION ALL 
                                SELECT id,UserId,Amount,PaymentDate FROM toll_payments) AS s
                        JOIN survey_logins l ON l.id=s.UserId
                                
                        WHERE l.designation='TC' AND l.suspended =0 AND s.PaymentDate BETWEEN '$req->from' AND '$req->to'
                        GROUP BY s.UserId   
                    ";
        $collection = DB::select($mQuery);
        return $collection;
    }
}
