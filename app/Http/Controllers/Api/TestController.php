<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class TestController extends Controller
{
    public function productcolor($id)
    {
       //$view=Product::find($id);
        $view=DB::table('products')
              ->join('colors','products.color_id','colors.id')
              ->select('colors.color_name','products.*')
              ->where('products.id',$id)
              ->first();
              $c=$view->color_name;
              $color=explode(',',$c);
            //   foreach($color as $row){
            //       echo $row."<br>";
            //   }
             return response()->json($color);
    }
}
