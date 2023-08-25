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
        $datalogistik = DB::table('tbllogistik')->whereNotIn('istatus', ['MUTASI', 'TERPASANG'], '')->get();
        return view('logistik_detail', ['tbllogistik' => $datalogistik]);
    }
    public function insert_logistik(Request $request)
    {
        $request->validate([
            'imei' => 'required|unique:tbllogistik,no_seri',
            'nm_brg' => 'required',
            'vendor' => 'required',
            'status_device' =>  'required',
            'location_device' => 'required',
            'kondisi_device' => 'required',
        ]);
        DB::table('tbllogistik')->insert([
            'nama_brg' => Str::of($request->nm_brg)->upper(),
            'no_seri' => Str::of($request->imei)->upper(),
            'id_vendor' => $request->vendor,
            'istatus' => Str::of($request->status_device)->upper(),
            'wilayah' => $request->location_device,
            'kondisi' => $request->kondisi_device,
            'created_at' => $request->created_at,
        ]);
        return redirect('logistik_detail')->withSuccess('Data Logistik Created Successfully!');
    }
    public function delete($imei)
    {
        logistik::find($imei)->delete();
        return back();
    }
    public function logistik_detail_SUM(){
        $count = DB::table('tbllogistik')->whereNotIn('istatus', ['MUTASI', 'TERPASANG'], '')->count();
        $totalTMD = DB::table ('tbllogistik')->whereNotIn('istatus', ['MUTASI', 'TERPASANG'])->where ('id_vendor','TMD PAC')->where('kondisi','BAIK','')->count();
        #$totalTMD=DB::select("Select COUNT(id_vendor)  AS TOTAL_TMD from tbllogistik where id_vendor='TMD PAC' AND kondisi !='RUSAK' AND istatus !='TERPASANG' AND istatus !='MUTASI'");
        $totalMPOS = DB::table ('tbllogistik')->whereNotIn('istatus', ['MUTASI', 'TERPASANG'])->where ('id_vendor','MPOS PAC')->where('kondisi','BAIK','')->count();
        $dataFElogistik = DB::table('tbllogistik')->orderBy('kondisi','ASC')->whereNotIn('istatus', ['MUTASI', 'TERPASANG'], '')->simplePaginate(115);
        $totalMutasi = DB::table ('tbllogistik')->whereNotIn('istatus', ['MUTASI'])->where ('id_vendor', ['MPOS PAC','TMD PAC'])->where('kondisi','BAIK','')->count();
        $totalRusak = DB::table ('tbllogistik')->whereNotIn('istatus', ['MUTASI','TERPASANG'])->where ('id_vendor', ['MPOS PAC','TMD PAC'])->where('kondisi','RUSAK','')->count();
        #return view('Beranda', ['tbllogistik' => $dataFElogistik]);
        #$arrayTotalTMD=array($totalTMD);
        #return view('Beranda',['datatmd' =>$arrayTotalTMD]);
       return view('admin', compact('dataFElogistik','count', 'totalTMD', 'totalMPOS','totalMutasi','totalRusak'));
        #return $totalTMD;
        #return view ('Beranda',['data' => $totalTMD]);
    }
}
