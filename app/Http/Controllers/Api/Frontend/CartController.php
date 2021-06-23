<?php

namespace App\Http\Controllers\Api\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CartController extends Controller
{
    public function AddtoCart(Request $request,$id)
    {
        $product=DB::table('products')->where('id',$id)->first();
        $data=array();
        $data['pro_id']=$id;
        $data['pro_name']= $product->product_name;
        $data['pro_quantity']= $request->pro_quantity;
        $data['color']= $request->color;
        $data['size']= $request->size;
        $data['pro_price']= $product->sale_price;
        $data['sub_total']= $product->sale_price;
        return response()->json($data);
    }
}
