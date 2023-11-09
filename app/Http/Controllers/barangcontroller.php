<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class barangcontroller extends Controller
{
    public function index(Request $request)
    {
        $request -> validate([
            'Nama_Machine' => 'required | unique:tblbarang,nama_brg',
        ]);
        DB::table('tblbarang')->insert([
            'nama_brg' => Str::of($request->Nama_Machine)->upper(),
            'created_at' => $request->created_at,
        ]);
        #dd($request->all());
        return redirect ('addlogistik')->withSuccess('Nama Barang Created Successfully!');
    }
}
