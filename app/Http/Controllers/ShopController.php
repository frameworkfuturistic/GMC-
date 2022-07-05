<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Shop\EloquentShopRepository;

/**
 * Created On-04-07-2022 
 * Created By-Anshu Kumar
 * Created for Shop Master, Shop Bill and Shop Payments 
 */
class ShopController extends Controller
{
    protected $eloquentShop;

    public function __construct(EloquentShopRepository $eloquentShop){
        $this->EloquentShop=$eloquentShop;
    }
    /**
     * Function for Shop Data and Details View
     */
    public function shopMasterView(){
        return $this->EloquentShop->shopMasterView();
    }

    /**
     * Getting shop by Their Ids
     * @param $id
     */

    public function getShops($id){
        return $this->EloquentShop->getShops($id);
    }

    /**
     * Getting Area List of Shops
     */

     public function getAreaList(){
        return $this->EloquentShop->getAreaList();
     }

     /**
      * Getting Shop By Area
      */

     public function getShopByArea(Request $request){
        return $this->EloquentShop->getShopByArea($request);
     }

     /**
      * get All Shops List
      */
      public function getAllShops(){
        return $this->EloquentShop->getAllShops();
      }
}
