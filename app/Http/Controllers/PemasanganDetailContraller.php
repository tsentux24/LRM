<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PemasanganDetailContraller extends Controller
{
    public function index()
    {
        $Datapemasangan = DB::table('tblpemasangan')->get();
        return view('pemasangan_detail', ['tblpemasangan' => $Datapemasangan]);

    }
    public function detailLogistik()
    {
        #$datalogistik = DB::table('tbllogistik')->get();
        $datalogistik = DB::table('tbllogistik')->whereNotIn('istatus', ['MUTASI', 'TERPASANG'], '')->get();
        $dataWajibPajak = DB:: table('tblwajibpajak')->orderBy('wajib_pajak', 'ASC')->get();
        return view('insert.addinstallation', compact('datalogistik', 'dataWajibPajak'));
        #return view('insert.addinstallation', ['tbllogistik' => $datalogistik]);
    }
    public function insertPemasangan(Request $request){
        $request->validate([
            'Nomor_Seri' => 'required',
            'Wajib_Pajak' => 'required',
            'Tanggal_Pemasangan' => 'required',
            'Keterangan' =>  'required',
        ]);
        $strwajibpajak = $request->Wajib_Pajak;
        $pecahWajib_Pajak = explode(',', $strwajibpajak);
        $strnmBrg =$request->Nomor_Seri;
        $pecahnmBrg = explode(',', $strnmBrg);
        $data = DB::table('tbllogistik')->where('no_seri', $pecahnmBrg[0], '')->first();
        
        DB::table('tblpemasangan')->insert([
            'no_seri' => $pecahnmBrg[0],
            'nama_brg' => $pecahnmBrg[1],
            'id_vendor' => $pecahWajib_Pajak[1],
            'wajib_pajak' => $pecahWajib_Pajak[0],
            'tgl_pasang' => $request->Tanggal_Pemasangan,
            'keterangan' => $request->Keterangan,
            'created_at' => $request->created_at,
        ]);
        $updated_at = date('Y-m-d H:i:s', time());
        DB::table('tbllogistik')->where('no_seri', $data->no_seri)->update([
            'istatus' => 'TERPASANG',
            'updated_at' => $updated_at
        ]);
        DB::table('logtbllogistik')->insert([
            'no_seri' => $pecahnmBrg[0],
            'nama_brg' => $pecahnmBrg[1],
            'oldstatus' => $data->istatus,
            'kondisi' => $data->kondisi,
            'newstatus' => Str::of($request->Keterangan)->upper(),
            'tgl_mutasi' => $request->Tanggal_Pemasangan,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
        ]);
        return redirect('pemasangan_detail')->withSuccess('Data Logistik Created Successfully!');
    }

    }
