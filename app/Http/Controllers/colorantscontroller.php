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
        $datacoloRE=DB::table('tblpricecolorount')-> where ('id',7) ->get();
        $datacoloDB=DB::table('tblpricecolorount')-> where ('id',8) ->get();
        $datacoloRD=DB::table('tblpricecolorount')-> where ('id',9)->get(); 
        $datacoloYK=DB::table('tblpricecolorount')-> where ('id',10)->get(); 
        $datacoloWP=DB::table('tblpricecolorount')-> where ('id',11)->get(); 
        $datacoloRV=DB::table('tblpricecolorount')-> where ('id',12)->get(); 
        $datacoloHP=DB::table('tblpricecolorount')-> where ('id',13)->get(); 
        $datacoloOS=DB::table('tblpricecolorount')-> where ('id',14)->get(); 
        $datacoloYV=DB::table('tblpricecolorount')-> where ('id',15)->get(); 
        return view ('insert.Colorount_Calculation', compact('datacolo','datacoloPT','datacoloYE','datacoloGK','datacoloBO','datacoloBM','datacoloRE','datacoloDB','datacoloRD','datacoloYK','datacoloWP','datacoloRV','datacoloHP','datacoloOS','datacoloYV'));
    }
}
