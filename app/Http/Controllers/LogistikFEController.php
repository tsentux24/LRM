<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LogistikDataExport;
use App\Exports\LogistikExport;
use Illuminate\Support\Facades\DB;
use App\Models\logistik;

class LogistikFEController extends Controller
{
    public function logistik_detail(){
        $count = DB::table('tbllogistik')->whereNotIn('istatus', ['MUTASI', 'TERPASANG'], '')->count();
        $totalTMD = DB::table ('tbllogistik')->whereNotIn('istatus', ['MUTASI', 'TERPASANG'])->where ('id_vendor','TMD PAC')->where('kondisi','BAIK','')->count();
        #$totalTMD=DB::select("Select COUNT(id_vendor)  AS TOTAL_TMD from tbllogistik where id_vendor='TMD PAC' AND kondisi !='RUSAK' AND istatus !='TERPASANG' AND istatus !='MUTASI'");
        $totalMPOS = DB::table ('tbllogistik')->whereNotIn('istatus', ['MUTASI', 'TERPASANG'])->where ('id_vendor','MPOS PAC')->where('kondisi','BAIK','')->count();
        $dataFElogistik = DB::table('tbllogistik')->orderBy('kondisi','ASC')->whereNotIn('istatus', ['MUTASI', 'TERPASANG'], '')->simplePaginate(115);
        #return view('Beranda', ['tbllogistik' => $dataFElogistik]);
        #$arrayTotalTMD=array($totalTMD);
        #return view('Beranda',['datatmd' =>$arrayTotalTMD]);
       return view('Beranda', compact('dataFElogistik','count', 'totalTMD', 'totalMPOS'));
        #return $totalTMD;
        #return view ('Beranda',['data' => $totalTMD]);
    }
    public function export() 
    {
        return Excel::download(new LogistikExport, 'Logistik_export.xlsx');
        
    }
}
