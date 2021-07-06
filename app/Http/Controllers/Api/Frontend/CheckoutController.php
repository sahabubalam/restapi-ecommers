<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CheckoutController extends Controller
{
    public function GetUpozelabyDsitrict()
    {
        $district_id=request('district_id');
        $upozela=DB::table('upozelas')->where('district_id',$district_id)->get();
        return response()->json($upozela);
    }
    public function GetshippingUpozelabyDsitrict()
    {
        $shippingdistrict_id=request('spdistrict_id');
        $upozela=DB::table('upozelas')->where('district_id',$shippingdistrict_id)->get();
        return response()->json($upozela);
    }
    public function SelectAddress(Request $request)
    {
        $district_id=request('district_id');
        $shippingdistrict_id=request('spdistrict_id');
        
       $data=array();
            $data['name']=$request->shipping_name;
            $data['phone']=$request->shipping_phone;
            $data['address']=$request->shipping_address;
            $data['district']=$shippingdistrict_id;
            $data['upozela']=$request->shipping_upozela;
            $data['village']=$request->shipping_village;
            $data['postal_code']=$request->shipping_postal_code;
            DB::table('shippingaddresses')->insert($data);
       
            $data=array();
            $data['name']=$request->name;
            $data['phone']=$request->phone;
            $data['address']=$request->address;
            $data['district']=$district_id;
            $data['upozela']=$request->upozela;
            $data['village']=$request->village;
            $data['postal_code']=$request->postal_code;
            DB::table('billingaddresses')->insert($data);
            return response()->json($data);
        
    }
}
