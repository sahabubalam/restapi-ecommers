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
}
