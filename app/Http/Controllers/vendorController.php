<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vendor;
use App\Models\tblWilayah;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class vendorController extends Controller
{
    public function vendorList()
    {
        $dataVendor = vendor::orderBy('nm_vendor', 'ASC')->get();
        $datawilayah = tblWilayah::orderBy('nm_wilayah', 'ASC')->get();
        return view('insert.addlogistik', compact('dataVendor', 'datawilayah'));
    }
    public function vendordetail()
    {
        $DataDetailVendor = DB::table('tblvendor')->get();
        return view('vendor_detail', ['tblvendor' => $DataDetailVendor]);
    }
    public function insert_vendor(Request $request)
    {
        $request->validate([
            'Nama_Vendor' => 'required |unique:tblvendor,nm_vendor',
            'Alamat_Vendor' => 'required',
        ]);
        DB::table('tblvendor')->insert([
            'nm_vendor' => Str::of($request->Nama_Vendor)->upper(),
            'alamat_vendor' => Str::of($request->Alamat_Vendor)->upper(),
            'created_at' => $request->created_at,
        ]);
        return redirect('vendor_detail')->withSuccess('Data Vendor Created Successfully!');
    }
    public function delete($id)
    {
        vendor::find($id)->delete();
        return back();
    }
}
