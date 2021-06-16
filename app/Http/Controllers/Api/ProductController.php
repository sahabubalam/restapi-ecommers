<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Image;
use DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::all();
        return response()->json($product);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'product_name'=>'required|unique:products|max:255',
            'regular_price'=>'required',
            'sale_price'=>'required',
        ]);
        if($request->photo){
            $position = strpos($request->photo,';');
            $sub = substr($request->photo,0,$position);
            $ext=explode('/', $sub)[1];

            $name=time().".".$ext;
            $img=Image::make($request->photo)->resize(240,200);
            $upload_path='backend/product/';
            $img_url=$upload_path.$name;
            $img->save( $img_url);
            $product = new Product();
            $product->product_name=$request->product_name;
            $product->product_description=$request->product_description;
            $product->short_description=$request->short_description;
            $product->regular_price=$request->regular_price;
            $product->sale_price=$request->sale_price;
            $product->quantity=$request->quantity;
            $product->category_id=$request->category_id;
            $product->discount=$request->discount;
            $product->color_id=1;
            $product->size_id=1;
            $product->status=1;
            $product->featured=1;
            $product->photo= $img_url;
            $product->save();
           //return response()->json($product);

        }else{
            $product = new Product();
            $product->product_name=$request->product_name;
            $product->product_description=$request->product_description;
            $product->short_description=$request->short_description;
            $product->regular_price=$request->regular_price;
            $product->sale_price=$request->sale_price;
            $product->quantity=$request->quantity;
            $product->category_id=$request->category_id;
            $product->discount=$request->discount;
            $product->color_id=1;
            $product->size_id=1;
            $product->status=1;
            $product->featured=1;
            $product->save();
            //return response()->json($product);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=DB::table('products')->where('id',$id)->first();
        $img=$product->photo;
        if($img){
            unlink($img);
            DB::table('products')->where('id',$id)->delete();
        }else{
            DB::table('products')->where('id',$id)->delete();
        }
    }
}
