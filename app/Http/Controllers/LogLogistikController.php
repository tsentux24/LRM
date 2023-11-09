<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\logistik;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LogLogistikController extends Controller
{
    public function logistik_list()
    {
        #$dataLogistik = DB::table('tbllogistik')->get();
        $dataLogistik = DB::table('tbllogistik')->where('costumer', ['GUDANG TERNATE', 'GUDANG TOBELO','GUDANG BACAN'], '')->get();
        return view('insert.addmutasilogistik', ['tbllogistik' => $dataLogistik]);
    }
    public function viewHistory()
    {
        $HistoryDataAll = DB::table('logtbllogistik')->get();
        #dd($HistoryDataAll);
        return view('historyMutasi', ['logtbllogistik' => $HistoryDataAll]);
    }
    public function insert_log(Request $request)
    {
        $request->validate([
            'Nomor_Seri' => 'required',
            'Tanggal_Mutasi' => 'required',
            'Keterangan' => 'required',

        ]);
        $strNoSeri = $request->Nomor_Seri;
        $pecahnNoSeri = explode(',', $strNoSeri);
        $data = DB::table('tbllogistik')->where('no_seri', $pecahnNoSeri, '')->first();
        DB::table('logtbllogistik')->insert([
            'no_seri' => $data->no_seri,
            'nama_brg' => $data->nama_brg,
            'oldstatus' => $data->istatus,
            'kondisi' => $data->kondisi,
            'newstatus' => Str::of($request->Keterangan)->upper(),
            'tgl_mutasi' => $request->Tanggal_Mutasi,
            'created_at' => $request->created_at,
        ]);
        $updated_at = date('Y-m-d H:i:s', time());
        DB::table('tbllogistik')->where('no_seri', $data->no_seri)->update([
            'istatus' => 'MUTASI',
            'updated_at' => $updated_at
        ]);
        return redirect('/historyMutasi')->withSuccess('Data Mutasi Successfully!');
    }
    public function edit($id)
    {
        $EditDataLog = DB::table('logtbllogistik')->where('id', $id)->first();
        return view('edit.edithistorylog', ['edithistorylog' => $EditDataLog]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'Tanggal_Mutasi' => 'required',
            'Keterangan' => 'required',

        ]);
        DB::table('logtbllogistik')->where('id', $id)->update([
            'tgl_mutasi' =>  $request->Tanggal_Mutasi,
            'newstatus' => $request->Keterangan,
            'updated_at' => $request->updated_at
        ]);
        return redirect('/historyMutasi')->withSuccess('Data History Logistik Update Successfully!');
    }
}
