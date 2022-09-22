<?php

namespace App\Repository\Toll;

use App\Models\Toll;
use App\Models\TollPayment;
use App\Repository\Toll\TollRepository;
use App\Traits\Toll as TollTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\AppHelper;
use Yajra\DataTables\DataTables;
use App\Exports\TollExport;
use App\Models\Logs\TollPaymentLog;
use App\Models\surveyLogin;
use Maatwebsite\Excel\Facades\Excel;

class EloquentTollRepository implements TollRepository
{
    use TollTrait;
    use AppHelper;

    // Initialization of construct function for sidebar menu
    public function __construct()
    {
        $this->menuApp();
    }
    /**
     * Created On-07-07-2022
     * Created By-Anshu Kumar
     * ----------------------------
     * --------------------------------------------------------------
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
    public function getTollById($id)
    {
        // $0toll = Toll::where('id', $id)->get();
        $strSql = "
                select  t.*,
                        a.id as TranID,
                        date_format(a.PaymentFrom,'%d-%m-%Y') as DateFrom,
                        date_format(a.PaymentTo,'%d-%m-%Y') as DateTo,
                        a.Amount,
                        a.PmtMode,
                        a.Rate AS PaidRate,
                        a.Days,
                        s.name as UserName,
                        s.mobile as UserMobile,
                        date_format(a.PaymentDate,'%d-%m-%Y'),
                        a.created_at
                        from tolls t
                        left join (SELECT id,tollid,`FROM` AS PaymentFrom,`TO` AS PaymentTo,Amount,PmtMode,
                                Rate,Days,PaymentDate,UserId,created_at from toll_payments where tollid=$id
                        order by id desc limit 1) as a on a.tollid=t.id
                        left join survey_logins s on s.id=a.UserID
                        WHERE t.id=$id
        ";

        $toll = DB::select($strSql);

        $arr = array();
        if ($toll) {
            foreach ($toll as $tolls) {
                // $dDate = date_create($tolls->created_at ?? '');
                // $created_at = date_format($dDate, 'd-m-Y');

                $created_at = $tolls->created_at == null ? '' : date_format(date_create($tolls->created_at), 'd-m-Y');
                $val['VendorID'] = $tolls->id ?? '';
                $val['AreaName'] = $tolls->AreaName ?? '';
                $val['ShopType'] = $tolls->ShopType ?? '';
                $val['VendorName'] = $tolls->VendorName ?? '';
                $val['Address'] = $tolls->Address ?? '';
                $val['DailyTollRate'] = $tolls->Rate ?? '';
                $val['LastPaymentAmount'] = $tolls->Amount ?? '';
                $val['LastPaymentDate'] = date_format(date_create($tolls->LastPaymentDate), 'd-m-Y');
                $val['Location'] = $tolls->Location ?? '';
                $val['PresentLength'] = $tolls->PresentLength ?? '';
                $val['PresentBreadth'] = $tolls->PresentBreadth ?? '';
                $val['PresentHeight'] = $tolls->PresentHeight ?? '';
                $val['NoOfFloors'] = $tolls->NoOfFloors ?? '';
                $val['TradeLicense'] = $tolls->TradeLicense ?? '';
                $val['Construction'] = $tolls->Construction ?? '';
                $val['Utility'] = $tolls->Utility ?? '';
                $val['Mobile'] = $tolls->Mobile ?? '';
                $val['Remarks'] = $tolls->Remarks ?? '';
                $val['Photograph1'] = $tolls->Photograph1 ?? '';
                $val['Photograph2'] = $tolls->Photograph2 ?? '';

                $val['TranID'] = $tolls->TranID ?? '';
                $val['DateFrom'] = $tolls->DateFrom ?? '';
                $val['DateTo'] = $tolls->DateTo ?? '';
                $val['Amount'] = $tolls->Amount ?? '';
                $val['PmtMode'] = $tolls->PmtMode ?? '';
                $val['RatePaid'] = $tolls->PaidRate ?? '';
                $val['PmtDays'] = $tolls->Days ?? '';
                $val['PaymentDate'] = $tolls->PaymentDate ?? '';
                $val['UserName'] = $tolls->UserName ?? '';
                $val['UserMobile'] = $tolls->UserMobile ?? '';
                $val['CreatedAt'] = $created_at ?? '';
                array_push($arr, $val);
            }
            return response()->json($arr, 200);
        } else {
            return response()->json(['Data Not Found for'], 404);
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
        $arr = array();
        $detail = Toll::select('id', 'ShopNo', 'ShopType', 'AreaName', 'VendorName', 'Address', 'Location', 'LastPaymentDate', 'LastAmount')
            ->where('AreaName', '=', $request->AreaName)
            ->where('Location', '=', $request->Location)
            ->orderByDesc('id')
            ->get();
        foreach ($detail as $details) {
            $val['id'] = $details->id ?? '';
            $val['ShopNo'] = $details->ShopNo ?? '';
            $val['ShopType'] = $details->ShopType ?? '';
            $val['AreaName'] = $details->AreaName ?? '';
            $val['VendorName'] = $details->VendorName ?? '';
            $val['Address'] = $details->Address ?? '';
            $val['Location'] = $details->Location ?? '';
            $val['LastPaymentDate'] = $details->LastPaymentDate ?? '';
            $val['LastAmount'] = $details->LastAmount ?? '';
            array_push($arr, $val);
        }
        return response()->json($arr, 200);
    }

    /**
     * Toll Payment (Version 2)
     */
    public function tollPayment(Request $request, $id)
    {
        $request->validate([
            'From' => 'required',
            'To' => 'required',
        ]);

        try {
            $toll = Toll::find($id);
            $formatted_from = date_create($request->From);
            $mLastPaymentDate = date_format($formatted_from, "Y-m-d");
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
                    $tp->Days = $interval->format("%a") + 1;

                    // Calculating Amount
                    $Rate = $toll->Rate;
                    $tp->Amount = $tp->Days * $Rate;
                    $toll->LastAmount = $tp->Days * $Rate;
                    $toll->LastPaymentDate = $tp->To;

                    $tp->PmtMode = 'CASH';
                    $tp->PaymentDate = date("Y-m-d H:i:s");
                    $tp->UserId = auth()->user()->id;

                    $toll->save();
                    $tp->save();

                    $query = DB::select("
                    select * from survey_logins where id='$toll->UserId'
                    ");
                    return response()->json([
                        'message' => 'Payment Successful',
                        'vendor_name' => $toll->VendorName,
                        'vendor_mobile' => $toll->ContactNo,
                        'vendor_id' => $toll->id,
                        'tran_id' => $tp->id,
                        'from' => $tp->From,
                        'to' => $tp->To,
                        'daily_toll_fee' => $tp->Rate,
                        'location_name' => $toll->Location,
                        'area_name' => $toll->AreaName,
                        'days' => $tp->Days,
                        'amount' => $tp->Amount,
                        'tax_collector_name' => $query[0]->name,
                        'tax_collector_mobile' => $query[0]->mobile,
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
            $this->saving($toll, $request);
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
        $request->validate([
            'VendorName' => 'required',
        ]);

        try {
            $toll = Toll::find($id);
            $this->saving($toll, $request);
            $toll->save();
            return response()->json('Successfully Updated', 200);
        } catch (Exception $e) {
            return response()->json($e, 400);
        }
    }

    /**
     * Get Toll Area List
     */
    public function getAreaList()
    {
        $area = Toll::select('AreaName')
            ->distinct()
            ->get();
        return response()->json($area, 200);
    }

    /**
     * Total Collection Between Dates
     */
    public function totalCollection(Request $request)
    {
        $collectionSummaryQuery = "SELECT 
                                    p.id AS PaymentID,
                                    t.id,
                                    t.AreaName AS Area,
                                    t.VendorName,
                                    date_format(p.From,'%d-%b-%y') AS PaymentFrom,
		                            date_format(p.To,'%d-%b-%y') AS PaymentTo,
                                    p.Amount,
                                    date_format(p.PaymentDate,'%d-%b-%y') AS PaymentDate,
                                    p.Rate,
                                    l.name AS CollectedBy
                            FROM toll_payments p
                            INNER JOIN tolls t ON t.id=p.TollId
                            INNER JOIN survey_logins l ON l.id=p.UserId
                            WHERE p.PaymentDate BETWEEN DATE_FORMAT('$request->TollFrom','%Y-%m-%d') AND DATE_FORMAT('$request->TollTo','%Y-%m-%d') AND p.IsActive=1
                            ORDER BY p.id DESC";
        $collectionSummary = DB::select($collectionSummaryQuery);
        return $collectionSummary;
    }

    /**
     * | Toll Master View for the Web App
     */
    public function tollMaster(Request $req)
    {
        if ($req->ajax()) {
            $toll = Toll::select('id', 'AreaName', 'VendorName', 'Address', 'Rate', 'Location', 'Mobile')
                ->get();
            return DataTables::of($toll)
                ->make(true);
        }
        $array = [
            'parents' => $this->parent,
            'childs' => $this->child,
        ];
        return view('admin.Tolls.toll-master', $array);
    }

    /**
     * | Export all the Vendors Data to Excel
     */
    public function exportToExcel()
    {
        return Excel::download(new TollExport, 'toll.xlsx');
    }

    /**
     * | Toll Bill Payment view
     */
    public function tollBillPayments()
    {
        $user = surveyLogin::select('id', 'name')->get();
        $array = [
            'parents' => $this->parent,
            'childs' => $this->child,
            'users' => $user
        ];
        return view('admin.Tolls.toll-bill-payments', $array);
    }

    /**
     * | Save Toll Bill Payments
     * | @param Request $req
     */
    public function postTollBillPayments(Request $req)
    {
        $req->validate([
            'vendorID' => 'required|integer',
            'rate' => 'required|integer',
            'amount' => 'required|integer',
            'from' => 'required',
            'to' => 'required',
            'paymentDate' => 'required'
        ]);

        try {
            DB::beginTransaction();

            $toll = Toll::where('id', $req->vendorID)->first();
            if (!$toll) {
                DB::rollBack();
                return back()->with('error', 'Toll not found for this VendorID');
            }

            $generatedPaymentDate = date_create($req->paymentDate);
            // Toll Payment
            $tollPayment = new TollPayment();
            $tollPayment->TollId = $req->vendorID;
            $tollPayment->From = $req->from;
            $tollPayment->To = $req->to;
            $tollPayment->Amount = $req->amount;
            $tollPayment->PmtMode = 'CASH';
            $tollPayment->Rate = $req->rate;
            $tollPayment->TollId = $req->vendorID;

            // Days Calculation
            $dateTo = date_create($req->to);
            $dateFrom = date_create($req->from);
            if ($dateFrom > $dateTo) {
                DB::rollBack();
                return back()->with('error', 'Could Not Save!! Payment From is greater then Payment To');
            }
            $interval = date_diff($dateFrom, $dateTo);
            $days = $interval->format('%a') + 1;

            $tollPayment->Days = $days;
            $tollPayment->PaymentDate = $req->paymentDate;
            $tollPayment->UserId = $req->collectedBy;
            $tollPayment->Remarks = $req->remarks;
            $tollPayment->CreatedBy = auth()->user()->id;

            // Image Upload
            if ($file = $req->file('photoUpload')) {
                $ext = $file->getClientOriginalExtension();
                $fileSize = filesize($file);
                if ($fileSize > 2000000) {
                    DB::rollBack();
                    return back()->with('error', 'File Size Should Be less than 2 MB');
                }
                if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png') {
                    $year = $generatedPaymentDate->format('Y');
                    $fileName = $year . '/' . $req->vendorID . '-' . time() . '.' . $ext;
                    $tollPayment->ReceiptPath = $fileName;
                    $file->move('TollUploadReceipts/' . $year, $fileName);
                } else {
                    DB::rollBack();
                    return back()->with('error', 'File Name must be in png, jpg or jpeg');
                }
            }
            $tollPayment->save();
            // Reflection to Toll Master Table
            $toll->LastPaymentDate = $req->paymentDate;
            $toll->LastAmount = $req->amount;
            $toll->UserId = $req->collectedBy;
            $toll->save();

            DB::commit();
            return back()->with('message', 'Payment Reflection Successful');
        } catch (Exception $e) {
            DB::rollBack();
            return $e;
        }
    }

    /**
     * | For the Activation and Deactivation for the toll payments and creating logs
     * | #colString > Column string value for the log table which determine transaction is activating or deactivating
     * | toggle value 0 means the transaction is deactivating and value 1 means the transaction is activating
     */
    public function activateOrDeactivatePayment(Request $req, $id)
    {
        DB::beginTransaction();
        try {
            // Getting first the Shop Payment ID
            $tollPayment = TollPayment::find($id);
            if ($req->toggle == "true") {
                $tollPayment->IsActive = 0;
                $colString = "deactivated_by";
                $msg = ['message' => 'Successfully Deactivated The Transaction'];
            }
            if ($req->toggle == "false") {
                $tollPayment->IsActive = 1;
                $colString = "activated_by";
                $msg = ['message' => 'Successfully Activated The Transaction'];
            }
            $tollPayment->CreatedBy = auth()->user()->id;
            $tollPayment->save();

            // Creating Activation or Deactivation Log
            $log = new TollPaymentLog();
            $log->new_toll_payment_id = $tollPayment->id;
            $log->ip_address = $req->ip();
            $log->$colString = auth()->user()->id;
            $log->save();

            DB::commit();
            return response()->json($msg);
        } catch (Exception $e) {
            DB::rollBack();
            return $e;
        }
    }
}
