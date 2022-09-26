<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShopRequest;
use App\Repository\Shop\EloquentShopRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

/**
 * Created On-04-07-2022
 * Created By-Anshu Kumar
 * Created for Shop Master, Shop Bill and Shop Payments
 */
class ShopController extends Controller
{
    protected $eloquentShop;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $virtualRole = Config::get('constant-variable.VIRTUAL_ROLE');
            $user = auth()->user()->role_id ?? $virtualRole;            // variable -1 is for the users end
            $obj = new EloquentShopRepository($user);
            $this->EloquentShop = $obj;
            return $next($request);
        });
    }
    /**
     * Function for Shop Data and Details View
     */
    public function shopMasterView()
    {
        return $this->EloquentShop->shopMasterView();
    }

    // Shop Summary View
    public function shopSummaryView()
    {
        return $this->EloquentShop->shopSummaryView();
    }

    /**
     * Save Shops
     */
    public function saveShops(ShopRequest $request)
    {
        return $this->EloquentShop->saveShops($request);
    }

    /**
     * Edit Shops
     */

    public function editShops(Request $request, $id)
    {
        return $this->EloquentShop->editShops($request, $id);
    }

    // Get Shop By ID
    public function getShopByID($id)
    {
        return $this->EloquentShop->getShopByID($id);
    }

    // Get All Shops
    public function getAllShops()
    {
        return $this->EloquentShop->getAllShops();
    }

    // Get Shop Circle
    public function getShopCircle()
    {
        return $this->EloquentShop->getShopCircle();
    }

    // Get Shop Circle Market
    public function getShopCircleMarket()
    {
        return $this->EloquentShop->getShopCircleMarket();
    }

    // Get Shop Details by Circle
    public function getShopDetailsByCircle(Request $request)
    {
        return $this->EloquentShop->getShopDetailsByCircle($request);
    }

    // Shop Payments
    public function shopPayment(Request $request, $id)
    {
        return $this->EloquentShop->shopPayment($request, $id);
    }

    // Total Shop Collection
    public function totalShopCollection(Request $request)
    {
        return $this->EloquentShop->totalShopCollection($request);
    }

}
