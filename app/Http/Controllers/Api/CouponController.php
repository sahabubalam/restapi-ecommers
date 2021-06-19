<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use DB;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupon=Coupon::all();
        return response()->json($coupon);
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
            'code'=>'required|unique:coupons|max:255',
            'type'=>'required',
            'value'=>'required',
            
        ]);
        $coupon= new Coupon();
        $coupon->code=$request->code;
        $coupon->value=$request->value;
        $coupon->type=$request->type;
        $coupon->status=1;
        $coupon->save();
      // return response()->json($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coupon=DB::table('coupons')->where('id',$id)->first();
        return response()->json($coupon);
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
        $data['code']=$request->code;
        $data['value']=$request->value;
        $data['type']=$request->type;
        $data['status']=1;
        DB::table('coupons')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('coupons')->where('id',$id)->delete();
    }
}
