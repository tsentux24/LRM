<?php

namespace App\Http\Controllers;

use CreateTblvendorTable;
use Illuminate\Http\Request;
use App\Models\vendor;
use App\Models\logistik;
use App\Models\User;
use CreateTbllogistikTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LogistikController extends Controller
{
    public function logistikdetail()
    {
        #$datalogistik = DB::table('tbllogistik')->get();
        $datalogistik = DB::table('tbllogistik')->get();
        return view('logistik_detail', ['tbllogistik' => $datalogistik]);
    }

    public function insert_logistik(Request $request)
    {
        $request->validate([
            'imei' => 'required|unique:tbllogistik,no_seri',
            'nm_brg' => 'required',
            'Lokasi' =>  'required',
            'kondisi_Machine' => 'required',
        ]);
        DB::table('tbllogistik')->insert([
            'nama_brg' => Str::of($request->nm_brg)->upper(),
            'no_seri' => Str::of($request->imei)->upper(),
            'costumer' => Str::of($request->Lokasi)->upper(),
            'kondisi' => $request->kondisi_Machine,
            'note' =>'-',
            'created_at' => $request->created_at,
        ]);
        return redirect('logistik_detail')->withSuccess('Data Logistik Created Successfully!');
    }
    public function delete($imei)
    {
        logistik::find($imei)->delete();
        return back();
    }
    public function edit($no_seri){
        $dataedit = DB::table('tbllogistik')->where('no_Seri', $no_seri)->first();
        $datacostumer=DB::table('costumer')->get();
        $datanoseri=DB::table('tbllogistik')->get();
        return view('edit.edit_logistik', ['dataedit' => $dataedit],['datacostumer' => $datacostumer,'datanoseri' => $datanoseri]);
    }
    public function update(Request $request,$no_seri){
        $request->validate([
            'Nomor_Seri' => 'required',
            'Lokasi'=> 'required',
            'kondisi_Machine' => 'required',
            'Note' =>'required',
        ]);
        DB::table('tbllogistik')->where ('no_seri',$no_seri)->update([
            'no_seri' => $request -> Nomor_Seri,
            'costumer' => $request -> Lokasi,
            'kondisi' => $request -> kondisi_Machine,
            'note' => $request -> Note
        ]);
        return redirect('/logistik_detail')->withSuccess('Data Logistik Update Successfully!');

    }
}
