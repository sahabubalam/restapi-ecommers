<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Category;
use App\Models\Product;

class AllStatusUpdateController extends Controller
{
    public function couponstatus(Request $request,$id)
    {
        $active=Coupon::find($id);
        $update=$active->status;
        if($update==1){
            $active->status= 0;
            $active->save();
        }
        else{
           
            $active->status= 1;
            $active->save();
        }
    }
    //category status active inactive
    public function productstatus($id)
    {
        $active=Product::find($id);
        $update=$active->status;
        if($update==1){
            $active->status= 0;
            $active->save();
        }
        else{
           
            $active->status= 1;
            $active->save();
        }
    }
}
