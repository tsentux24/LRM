<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class colorantscontroller extends Controller
{
    public function colodetailYD(){
        #$datacolo=DB::table('tblpricecolorount')->get();
        $datacolo=DB::table('tblpricecolorount')-> where('id',1)->get();
        $datacoloPT=DB::table('tblpricecolorount')-> where('id',2)->get();
        $datacoloYE=DB::table('tblpricecolorount')-> where ('id',3)->get();
        $datacoloGK=DB::table('tblpricecolorount')-> where ('id',4)->get();
        $datacoloBO=DB::table('tblpricecolorount') -> where ('id',5)->get();
        $datacoloBM=DB::table('tblpricecolorount')-> where ('id',6) ->get();
        return view ('insert.Colorount_Calculation', compact('datacolo','datacoloPT','datacoloYE','datacoloGK','datacoloBO','datacoloBM'));
    }
}
