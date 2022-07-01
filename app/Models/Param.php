<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Param extends Model
{
    use HasFactory;

    public function getNewRenewalID($pre){
        $x=Param::where('id','1')->first();

        if($pre=='SF'){
            $str=$x->SelfAdPrefix;
            $counter=$x->SelfAdCounter;
            $str=$x->SelfAdPrefix;
            $counter=$x->SelfAdCounter;
            $x->SelfAdCounter=$counter+1;
        }
        
        elseif($pre=='VH'){ 
            $str=$x->VehiclePrefix;
            $counter=$x->VehicleCounter;
            $str=$x->VehiclePrefix;
            $counter=$x->VehicleCounter;
            $x->VehicleCounter=$counter+1;
        }
        elseif($pre=='PL'){
            $str=$x->LandPrefix;
            $counter=$x->LandCounter;
            $str=$x->LandPrefix;
            $counter=$x->LandCounter;
            $x->LandCounter=$counter+1;
        }
        elseif($pre=='BQ'){
            $str=$x->BanquetPrefix;
            $counter=$x->BanquetCounter;
            $str=$x->BanquetPrefix;
            $counter=$x->BanquetCounter;
            $x->BanquetCounter=$counter+1;
        }
        elseif($pre=='LD'){
            $str=$x->LodgePrefix;
            $counter=$x->LodgeCounter;
            $str=$x->LodgePrefix;
            $counter=$x->LodgeCounter;
            $x->LodgeCounter=$counter+1;
        }
        elseif($pre=='DH'){
            $str=$x->DharmasalaPrefix;
            $counter=$x->DharmasalaCounter;
            $str=$x->DharmasalaPrefix;
            $counter=$x->DharmasalaCounter;
            $x->DharmasalaCounter=$counter+1;
        }
        elseif($pre=='AG'){
            $str=$x->AgencyPrefix;
            $counter=$x->AgencyCounter;
            $str=$x->AgencyPrefix;
            $counter=$x->AgencyCounter;
            $x->AgencyCounter=$counter+1;
        }
        elseif($pre=='HRD'){
            $str=$x->HoardingPrefix;
            $counter=$x->HoardingCounter;
            $str=$x->HoardingPrefix;
            $counter=$x->HoardingCounter;
            $x->HoardingCounter=$counter+1;
        }

        $month=date("Ym");
        $m=substr($month,2);
        $strToSave=$str.$m.str_pad($counter,5,"0",STR_PAD_LEFT);
        $x->save();
        return $strToSave;
    }
}
