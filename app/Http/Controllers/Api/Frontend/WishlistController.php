<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class WishlistController extends Controller
{
    //add wishlist
    public function AddWishlist(Request $request,$id)
    {
        $product=DB::table('products')->where('id',$id)->first();
        $wishlist=DB::table('wishlists')->where('product_id',$id)->where('user_id',$request->user_id)->first();
        $data=array();
        $data['product_id']=$product->id;
        $data['product_name']=$product->product_name;
        $data['price']=$product->sale_price;
        $data['photo']=$product->photo;
        $data['user_id']=$request->user_id;
        if($wishlist)
        {
            return response()->json('Already Exists');
        }
        else
        {
            DB::table('wishlists')->insert($data);
            return response()->json($data);
        }
    }
    public function GettingWishlist($id)
    {
        $wishlist=DB::table('wishlists')
                ->join('products','products.id','wishlists.product_id')
                ->select('wishlists.*','products.quantity')
                 ->where('user_id',$id)->get();
        return response()->json($wishlist);
    }
}
