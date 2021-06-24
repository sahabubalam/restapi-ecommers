<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AllProductController extends Controller
{
    public function allProduct()
    {
        
    }
    public function GettingProduct($id)
    {
       // $product=DB::table('products')->where('category_id',$id)->get();
        $product=DB::table('products')
        ->join('categories','products.category_id','categories.id')
        ->select('categories.category_name','products.*')
        ->where('products.category_id',$id)
        ->get();
        return response()->json($product);
    }
    public function ProductDetails($id)
    {
        $productdetails=DB::table('products')
        ->join('categories','products.category_id','categories.id')
        ->join('colors','products.color_id','colors.id')
        ->join('sizes','products.size_id','sizes.id')
        ->select('categories.category_name','colors.color_name','sizes.size','products.*')
        ->where('products.id',$id)
        ->first();

        return response()->json($productdetails);
       
    }
    public function AddProductReview(Request $request)
    {
            
            $data=array();
            $data['user_id']=$request->user_id;
            $data['product_id']=$request->product_id;
            $data['rating']=$request->rating;
            $data['headline']=$request->headline;
            $data['description']=$request->description;
            $data['approved']=0;
            return response()->json($data);
    }
    public function name()
    {
        
        $user=User::all();
        return response()->json($user);
       // echo Auth::guard('api')->user()->id;
    }
   
  
}
