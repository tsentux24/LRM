<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LokasiController extends Controller
{
    public function insert_lokasi(Request $request)
    {
        $request->validate([
            'Kode_Lokasi' => 'required |unique:tblvendor,nm_vendor',
            'Alamat_Vendor' => 'required',
        ]);
        DB::table('tblvendor')->insert([
            'nm_vendor' => Str::of($request->Nama_Vendor)->upper(),
            'alamat_vendor' => Str::of($request->Alamat_Vendor)->upper(),
            'created_at' => $request->created_at,
        ]);
        return redirect('lokasi_detail')->withSuccess('Data Lokasi Created Successfully!');
    }
    public function lokasilist(){
        $datakonsumen = DB::table ('costumer')->orderBy('nama_toko', 'ASC')->get();
        return view('lokasi_detail', compact('datakonsumen'));
    }
}
