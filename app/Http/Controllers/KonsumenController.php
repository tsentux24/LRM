<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class KonsumenController extends Controller
{
    public function konsumendetail(){
        $datakonsumen = DB::table('costumer')->get();
        return view('admin', compact('datakonsumen'));
        #return view('konsumen_detail', ['tbllogistik' => $datakonsumen]);
    }
    public function konsumenlist(){
        $datakonsumen = DB::table ('costumer')->orderBy('nama_toko', 'ASC')->get();
        return view('insert.addlogistik', compact('datakonsumen'));
    }
}
