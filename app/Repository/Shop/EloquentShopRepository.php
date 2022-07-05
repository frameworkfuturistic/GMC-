<?php 

namespace App\Repository\Shop;
use App\Repository\Shop\ShopRepository;
use App\Traits\AppHelper;
use App\Models\Shop;
use App\Models\ShopPayment;
use Illuminate\Http\Request;

/**
 * Created On-04-07-2022 
 * Created By-Anshu Kumar
 * Repository for Saving Editing Bills and Payments for Shops
 * 
 */

class EloquentShopRepository implements ShopRepository{

    use AppHelper;

    public function __construct(){
        $this->menuApp();
    }

    /**
     * function for View of the Shop and Shop Details
     */

    public function shopMasterView(){
        $shop=Shop::orderBy('id', 'DESC')->get();
        $array=[
            'parents'=>$this->parent,
            'childs'=>$this->child,
            'shops'=>$shop
        ];
        return view('admin.Shops.details-view')->with($array);
    }

    /**
     * Edit Shops
     */
    public function editShops(Request $request){
        dd($request->all());

        $shop=Shop::find($request->id);
    }

    /**
     * Getting All shops
     * @param $id
     */
    public function getShops($id){
        $shop=Shop::find($id);
        return response()->json($shop,201);
    }

    /**
     * Getting Shop Areas
     */
    public function getAreaList(){
        $area=Shop::select('AreaName')
                    ->distinct()
                    ->get();
        return response()->json($area,302);
    }

    /**
     * Getting Shop By Area
     */
    public function getShopByArea(Request $request){
        $request->validate([
            'AreaName'=>'required'
        ]);

        $shop=Shop::where('AreaName','=',$request->AreaName)
                    ->orderBy('id','Desc')
                    ->get();
        $arr=array();
        foreach($shop as $shops){
            $val['id']=$shops->id ?? '';
            $val['Allotee']=$shops->Allotee ?? '';
            $val['ShopNo']=$shops->ShopNo ?? '';
            $val['ShopType']=$shops->ShopType ?? '';
            $val['VendorName']=$shops->VendorName ?? '';
            $val['Address']=$shops->Address ?? '';
            $val['Location']=$shops->Location ?? '';
            $val['Length1']=$shops->Length1 ?? '';
            $val['Breadth1']=$shops->Breadth1 ?? '';
            $val['Height1']=$shops->Height1 ?? '';
            $val['Length2']=$shops->Length2 ?? '';
            $val['Breadth2']=$shops->Breadth2 ?? '';
            $val['Height2']=$shops->Height2 ?? '';
            $val['NoOfFloors']=$shops->NoOfFloors ?? '';
            $val['PresentOccupier']=$shops->PresentOccupier ?? '';
            $val['TradeLicense']=$shops->TradeLicense ?? '';
            $val['Construction']=$shops->Construction ?? '';
            $val['ConstructionType']=$shops->ConstructionType ?? '';
            $val['UtilityConnection']=$shops->UtilityConnection ?? '';
            $val['MobileConnection']=$shops->MobileConnection ?? '';
            $val['ElectricityConnection']=$shops->ElectricityConnection ?? '';
            $val['SalePurchase']=$shops->SalePurchase ?? '';
            $val['ContactNo']=$shops->ContactNo ?? '';
            $val['Remarks']=$shops->Remarks ?? '';
            $val['PhotographLocation']=$shops->PhotographLocation ?? '';
            $val['Latitude']=$shops->Latitude ?? '';
            $val['Longitude']=$shops->Longitude ?? '';
            array_push($arr, $val);
        }
        return response()->json($arr,302);
    }

    /**
     * Getting All Shops
     */
    public function getAllShops(){
        $shop=Shop::orderBy('id', 'DESC')->get();
        $arr=array();
        foreach($shop as $shops){
            $val['id']=$shops->id ?? '';
            $val['Allotee']=$shops->Allotee ?? '';
            $val['ShopNo']=$shops->ShopNo ?? '';
            $val['ShopType']=$shops->ShopType ?? '';
            $val['VendorName']=$shops->VendorName ?? '';
            $val['Address']=$shops->Address ?? '';
            $val['Location']=$shops->Location ?? '';
            $val['Length1']=$shops->Length1 ?? '';
            $val['Breadth1']=$shops->Breadth1 ?? '';
            $val['Height1']=$shops->Height1 ?? '';
            $val['Length2']=$shops->Length2 ?? '';
            $val['Breadth2']=$shops->Breadth2 ?? '';
            $val['Height2']=$shops->Height2 ?? '';
            $val['NoOfFloors']=$shops->NoOfFloors ?? '';
            $val['PresentOccupier']=$shops->PresentOccupier ?? '';
            $val['TradeLicense']=$shops->TradeLicense ?? '';
            $val['Construction']=$shops->Construction ?? '';
            $val['ConstructionType']=$shops->ConstructionType ?? '';
            $val['UtilityConnection']=$shops->UtilityConnection ?? '';
            $val['MobileConnection']=$shops->MobileConnection ?? '';
            $val['ElectricityConnection']=$shops->ElectricityConnection ?? '';
            $val['SalePurchase']=$shops->SalePurchase ?? '';
            $val['ContactNo']=$shops->ContactNo ?? '';
            $val['Remarks']=$shops->Remarks ?? '';
            $val['PhotographLocation']=$shops->PhotographLocation ?? '';
            $val['Latitude']=$shops->Latitude ?? '';
            $val['Longitude']=$shops->Longitude ?? '';
            array_push($arr, $val);
        }
        return response()->json($arr,302);
    }

    /**
     * Save Shop Payments
     */
    public function shopPayments(Request $request){
        $request->validate([
            'shopId'=>'required',
            'amount'=>'required'
        ]);
        
        $payment=new ShopPayment;
        $payment->ShopID=$request->shopId;
        $payment->From='2022-06-01';
        $payment->To='2022-07-31';
        $payment->Amount=$request->amount;
        $payment->PmtMode='Cash';
        $payment->PmtDate=date("Y-m-d");
        $payment->CollectedBy='1';
        $payment->save();
        return response()->json('Successfully Saved',201);
    }
}