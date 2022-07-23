<?php

namespace App\Repository\Shop;

use App\Http\Requests\ShopRequest;
use App\Models\Shop;
use App\Models\ShopPayment;
use App\Repository\Shop\ShopRepository;
use App\Traits\AppHelper;
use App\Traits\Shop as ShopTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

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
        $stmQuery = "select sum(Amount) as TotalCollection
                    from shop_payments";
        $shop_total = DB::select($stmQuery);
        $array = [
            'parents' => $this->parent,
            'childs' => $this->child,
            'total_shop' => $shop_total[0]->TotalCollection,
        ];
        return view('admin.Shops.summary-view')->with($array);
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
                select s.ID,
                s.Market,
                s.Allottee,
                s.ShopNo,
                s.Rate as RatePaid,
                s.LastPaymentDate,
                s.LastAmount as Amount,
                a.PmtMode,
                date_format(a.From,'%d-%m-%y') as PaymentFrom,
                date_format(a.To,'%d-%m-%y') as PaymentTo,
                a.Months as PmtMonths,
                a.PaymentDate,
                l.name as UserName,
                l.mobile as UserMobile,
                a.created_at
                from shops s
            left join (select * from shop_payments where ShopId=$id order by id desc limit 1) as a on a.ShopId=s.id
            left join survey_logins l on l.id=s.UserId
            where s.id=$id
        ";

        $shop = DB::select($strSql);
        $arr = array();
        foreach ($shop as $shops) {
            $created_at = $shops->created_at == null ? '' : date_format(date_create($shops->created_at), 'd-m-Y');
            $val['ShopID'] = $shops->ID ?? '';
            $val['Market'] = $shops->Market ?? '';
            $val['Allottee'] = $shops->Allottee ?? '';
            $val['ShopNo'] = $shops->ShopNo ?? '';
            $val['RatePaid'] = $shops->RatePaid ?? '';
            $val['LastPaymentDate'] = $shops->LastPaymentDate ?? '';
            $val['Amount'] = $shops->Amount ?? '';
            $val['PmtMode'] = $shops->PmtMode ?? '';

            $val['PaymentFrom'] = $shops->PaymentFrom ?? '';
            $val['PaymentTo'] = $shops->PaymentTo ?? '';
            $val['PmtMonths'] = $shops->PmtMonths ?? '';
            $val['PaymentDate'] = $shops->PaymentDate ?? '';
            $val['UserName'] = $shops->UserName ?? '';
            $val['UserMobile'] = $shops->UserMobile ?? '';
            $val['CreatedAt'] = $created_at ?? '';
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

        $shop = Shop::select('ID', 'Circle', 'Market', 'Allottee', 'ShopNo', 'Rate', 'LastPaymentDate', 'LastAmount', 'created_at', 'updated_at')
            ->where('Circle', '=', $request->Circle)
            ->where('Market', '=', $request->Market)
            ->orderByDesc('ID')
            ->get();

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
     * Shop Payments
     */
    public function shopPayment(Request $request, $id)
    {
        $request->validate([
            'To' => 'required',
        ]);

        try {
            $shop = Shop::find($id);
            $mLastPaymentDate = $shop->LastPaymentDate;
            if (!$mLastPaymentDate) {
                return response()->json('This shop has no Last Payment Date', 400);
            }
            if ($mLastPaymentDate) {
                $create = date_create($request->To);
                $format = date_format($create, "Y-m-d");
                if ($format > $mLastPaymentDate) {
                    $Rate = $shop->Rate;
                    $shop->UserId = auth()->user()->id;

                    $sp = new ShopPayment;
                    $sp->ShopId = $shop->ID;
                    $From = date_create($mLastPaymentDate);
                    $sp->From = date_format($From, 'Y-m-d');
                    $sp_from = date_format($From, 'M-Y');
                    $To = date_create($request->To);
                    $sp->To = date_format($To, 'Y-m-d');
                    $sp_to = date_format($To, 'M-Y');
                    $sp->Rate = $Rate;
                    // Calculating Months
                    $interval = date_diff($From, $To);
                    $sp->Months = $interval->format("%m");

                    // Calculating Amount
                    $Rate = $shop->Rate;
                    $sp->Amount = $sp->Months * $Rate;

                    $shop->LastAmount = $sp->Months * $Rate;
                    $shop->LastPaymentDate = $sp->To;

                    $sp->PmtMode = 'CASH';
                    $sp->PaymentDate = date("Y-m-d H:i:s");
                    $sp->UserId = auth()->user()->id;

                    $shop->save();
                    $sp->save();

                    $query = DB::select("
                    select * from survey_logins where id='$shop->UserId'
                    ");
                    return response()->json([
                        'message' => 'Payment Successful',
                        'circle' => $shop->Circle,
                        'Market' => $shop->Market,
                        'shop_id' => $shop->ID,
                        'shop_no' => $shop->ShopNo,
                        'present_occupier' => $shop->PresentOccupier,
                        'contact_no' => $shop->ContactNo,
                        'tran_id' => $sp->id,
                        'from' => $sp_from,
                        'to' => $sp_to,
                        'daily_shop_fee' => $sp->Rate,
                        'months' => $sp->Months,
                        'amount' => $sp->Amount,
                        'tax_collector_name' => $query[0]->name,
                        'tax_collector_mobile' => $query[0]->mobile,
                    ], 200);
                } else {
                    return response()->json('Date Should be after the Last Payment Date', 400);
                }
            }
        } catch (Exception $e) {
            return response()->json($e, 400);
        }
    }
}
