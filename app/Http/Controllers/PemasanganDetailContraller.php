<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\tbllogostikModel;


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
        $datalogistik = DB::table('tbllogistik')->where('costumer', ['GUDANG TERNATE', 'GUDANG TOBELO','GUDANG BACAN'], '')->get();
        $dataCustomer = DB:: table('costumer')->whereNotIn('nama_toko',['GUDANG TERNATE','GUDANG TOBELO','GUDANG BACAN'],'')->get();
        return view('insert.addinstallation', compact('datalogistik', 'dataCustomer'));
        #return view('insert.addinstallation', ['tbllogistik' => $datalogistik]);
    }
    public function insertPemasangan(Request $request){
        $request->validate([
            'Nomor_Seri' => 'required',
            'Customer' => 'required',
            'Tanggal_Pemasangan' => 'required',
            'Keterangan' =>  'required',
        ]);
        $strnmBrg =$request->Nomor_Seri;
        $pecahnmBrg = explode(',', $strnmBrg);
        $data = DB::table('tbllogistik')->where('no_seri', $pecahnmBrg[0], '')->first();
        
        DB::table('tblpemasangan')->insert([
            'no_seri' => $pecahnmBrg[0],
            'nama_brg' => $pecahnmBrg[1],
            'costumer' => $request->Customer,
            'tgl_pasang' => $request->Tanggal_Pemasangan,
            'keterangan' => $request->Keterangan,
            'created_at' => $request->created_at,
        ]);
        $updated_at = date('Y-m-d H:i:s', time());
        DB::table('tbllogistik')->where('no_seri', $data->no_seri)->update([
            'costumer' => $request->Customer,
            'updated_at' => $updated_at
        ]);
        DB::table('logtbllogistik')->insert([
            'no_seri' => $pecahnmBrg[0],
            'nama_brg' => $pecahnmBrg[1],
            'oldstatus' => $data->costumer,
            'newstatus' => Str::of($request->Keterangan)->upper(),
            'tgl_mutasi' => $request->Tanggal_Pemasangan,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
        ]);
        return redirect('pemasangan_detail')->withSuccess('Data Logistik Created Successfully!');
    }
    public function delete($no_seri)
    {
        tbllogostikModel::find($no_seri)->delete();
        return redirect('pemasangan_detail')->withSuccess('Data Logistik Delete Successfully!');
    }

    }
