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
            $product->color_id=$request->color_id;
            $product->size_id=$request->size_id;
            $product->status=1;
            $product->featured=$request->featured;
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
            $product->color_id=$request->color_id;
            $product->size_id=$request->size_id;
            $product->status=1;
            $product->featured=$request->featured;
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
        $product=DB::table('products')->where('id',$id)->first();
        return response()->json($product);
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
        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_description']=$request->product_description;
        $data['short_description']=$request->short_description;
        $data['regular_price']=$request->regular_price;
        $data['sale_price']=$request->sale_price;
        $data['quantity']=$request->quantity;
        $data['category_id']=$request->category_id;
        $data['discount']=$request->discount;
        $data['color_id']=$request->color_id;
        $data['size_id']=$request->size_id;
        $data['status']=1;
        $data['featured']=$request->featured;
       $image=$request->newphoto;
       if($image){
        $position = strpos($image,';');
        $sub = substr($image,0,$position);
        $ext=explode('/', $sub)[1];

        $name=time().".".$ext;
        $img=Image::make($image)->resize(240,200);
        $upload_path='backend/product/';
        $img_url=$upload_path.$name;
        $success=$img->save( $img_url);
        if($success){
            
            $data['photo']=$img_url;
            $img=DB::table('products')->where('id',$id)->first();
            if($img->photo){
                $image_path=$img->photo;
                $done=unlink($image_path);
                $user=DB::table('products')->where('id',$id)->update($data);
            }else{
                $user=DB::table('products')->where('id',$id)->update($data);
            }
           
        }

       }else{
           $oldphoto=$request->photo;
           $data['photo']=$oldphoto;
           $user=DB::table('products')->where('id',$id)->update($data);

       }
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
