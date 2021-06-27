<?php

namespace App\Http\Controllers\Api\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function AddtoCart(Request $request,$id)
    {
        $product=DB::table('products')->where('id',$id)->first();
        $product=Product::find($id);
        $cart=new Cart();
        $cart->pro_id=$id;
        $cart->user_id=$request->user_id;
        $cart->pro_name=$product->product_name;
        $cart->pro_quantity=$request->pro_quantity;
        $cart->color=$request->color;
        $cart->size=$request->size;
        $cart->pro_price=$product->sale_price;
        $cart->photo=$product->photo;
        $cart->sub_total=$product->sale_price;
        $cart->save();
        return response()->json($cart);
    }
    //getting cart product
    public function GetCartProduct($id)
    {
        $cart=DB::table('carts')->where('user_id',$id)->get();
        return response()->json($cart);
    }
}
