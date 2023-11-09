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
        $databarang = DB::table('tblbarang')->get();
        return view('insert.addlogistik', compact('datakonsumen','databarang'));
    }
    public function insert_lokasi(Request $request){
        $request->validate([
            'Kode_Lokasi' => 'required |unique:costumer,kode_toko',
            'Alamat_Lokasi' => 'required',
            'Nama_Lokasi' => 'required',
        ]);
        DB::table('costumer')->insert([
            'kode_toko' => Str::of($request->Kode_Lokasi)->upper(),
            'nama_toko' => Str::of($request->Nama_Lokasi)->upper(),
            'alamat' => Str::of($request->Alamat_Lokasi)->upper(),
            'created_at' => $request->created_at,
        ]);
        return redirect('lokasi_detail')->withSuccess('Data Lokasi Created Successfully!');
    }

    }
