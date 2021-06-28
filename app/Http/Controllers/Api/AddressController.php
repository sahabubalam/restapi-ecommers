<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Upozela;
use App\Models\Village;
use DB;

class AddressController extends Controller
{
    //district crud
    public function AddDistrict(Request $request)
    {
        $district=new District();
        $district->district_name=$request->district_name;
        $district->save();
        return response()->json($district);
    }
    public function GetDistrict()
    {
        $district=District::all();
        return response()->json($district);
    }
    public function DeleteDistrict($id)
    {
        DB::table('districts')->where('id',$id)->delete();
    }
    //upozela crud
    public function AddUpozela(Request $request)
    {
        $upozela=new Upozela();
        $upozela->upozela_name=$request->upozela_name;
        $upozela->district_id=$request->district_id;
        $upozela->save();
        return response()->json($upozela);
    }
    public function GetUpozela()
    {
        $upozela=Upozela::all();
        return response()->json($upozela);
    }
    public function DeleteUpozela($id)
    {
        DB::table('upozelas')->where('id',$id)->delete();
    }
    //village crud
    public function AddVillage(Request $request)
    {
        $village=new Village();
        $village->village_name=$request->village_name;
        $village->district_id=$request->district_id;
        $village->save();
        return response()->json($village);
    }
    public function GetVillage()
    {
        $village=Village::all();
        return response()->json($village);
    }
    public function DeleteVillage($id)
    {
        DB::table('villages')->where('id',$id)->delete();
    }
    
}
