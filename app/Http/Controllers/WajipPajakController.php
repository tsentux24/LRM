<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\WajibPajak;


class WajipPajakController extends Controller
{
    public function Wpdetail()
    {
        $dataWp = DB::table('tblwajibpajak')->get();
        $count = WajibPajak::count();
        $totalTMD = WajibPajak::where('vendor', 'TMD PAC')->count();
        $totalMPOS = WajibPajak::where('vendor', 'MPOS PAC')->count();
        $totalBAREBONE = WajibPajak::where('vendor', 'BAREBONE')->count();
        $totalAPI = WajibPajak::where('vendor', 'API')->count();
        $totalPACHOTEL = WajibPajak::where('vendor', 'PAC HOTEL')->count();
        $totalTMDAPI = WajibPajak::where('vendor', 'TMD API')->count();
        $totalMINIPC = WajibPajak::where('vendor', 'MINI PC')->count();
        $inactive = WajibPajak::where('status', 'inactive')->count();
        return view('wp_detail', compact('dataWp', 'count', 'totalTMD', 'totalMPOS', 'totalBAREBONE', 'totalAPI', 'totalPACHOTEL', 'totalTMDAPI', 'totalMINIPC', 'inactive'));
    }
    public function insert_wp(Request $request)
    {
        $request->validate([
            'NamaWP' => 'required|unique:tblwajibpajak,wajib_pajak',
            'group' => 'required',
            'vendor' => 'required',
            'Tanggal_Pasang' => 'required',
            'Alamat' => 'required',
            'Kabupaten' => 'required',
            'kategori' => 'required|min:1',
        ]);
        DB::table('tblwajibpajak')->insert([
            'status' => 'Active',
            'grup' => $request->group,
            'wajib_pajak' => Str::of($request->NamaWP)->ucfirst(),
            'vendor' => $request->vendor,
            'tgl_pasang' => $request->Tanggal_Pasang,
            'alamat' => Str::of($request->Alamat)->ucfirst(),
            'wilayah' => $request->Kabupaten,
            'kategori_wp' => json_encode($request->kategori),
            'created_at' => $request->created_at,
        ]);
        return redirect('wp_detail')->withSuccess('Data Wajib Pajak Created Successfully!');
    }
    public function edit($id)
    {
        $dataedit = DB::table('tblwajibpajak')->where('id', $id)->first();
        $datagroup = DB::table('tblgroup')->get();
        $dataVendor = DB::table('tblvendor')->get();
        $datawilayah = DB::table('tblarea')->get();
        # return view('edit.editWP', compact('dataVendor', 'datagroup', 'datawilayah', ['editwp' => $dataedit]));
        return view('edit.editWp', ['editwp' => $dataedit], ['dataVendor' => $dataVendor, 'datagroup' => $datagroup, 'datawilayah' => $datawilayah]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'NamaWP' => 'required',
            'group' => 'required',
            'Status' => 'required',
            'vendor' => 'required',
            'Tanggal_Pasang' => 'required',
            'Alamat' => 'required',
            'Kabupaten' => 'required',
            'kategori' => 'required|min:1',
        ]);
        DB::table('tblwajibpajak')->where('id', $id)->update([
            'grup' => $request->group,
            'status' => $request->Status,
            'wajib_pajak' => $request->NamaWP,
            'vendor' => $request->vendor,
            'tgl_pasang' => $request->Tanggal_Pasang,
            'alamat' => $request->Alamat,
            'wilayah' => $request->Kabupaten,
            'kategori_wp' => $request->kategori,
            'updated_at' => $request->updated_at
        ]);
        return redirect('/wp_detail')->withSuccess('Data Wajib Pajak Update Successfully!');
    }
}
