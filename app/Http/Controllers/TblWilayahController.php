<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vendor;
use App\Models\tblWilayah;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TblWilayahController extends Controller
{
    public function dataWilayah()
    {
        $datawilayah = tblWilayah::all();
        return view('insert.addlogistik', compact('datawilayah'));
    }
    public function Wilayahdetail()
    {
        $DataDetailwilayah = DB::table('tblwilayah')->get();
        return view('wilayah_detail', ['tblwilayah' => $DataDetailwilayah]);
    }
    public function delete($id)
    {
        tblWilayah::find($id)->delete();
        return back();
    }
    public function insertwilayah(Request $request)
    {
        $request->validate([
            'provinsi' => 'required',
            'Wilayah' => 'required',
        ]);
        DB::table('Tblwilayah')->insert([
            'kode_wilayah' => Str::of($request->provinsi)->upper(),
            'nm_wilayah' => Str::of($request->Wilayah)->upper(),
            'created_at' => $request->created_at,
        ]);
        return redirect('wilayah_detail')->withSuccess('Data Wilayah Created Successfully!');
    }
    public function edit($id)
    {
        $DataEditWil = DB::table('tblwilayah')->where('id', $id)->first();
        $DataArea = DB::table('tblarea')->get();
        return view('edit.editWil', ['editWil' => $DataEditWil, 'dataarea' => $DataArea]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'provinsi' => 'required',
            'Wilayah' => 'required',
        ]);
        DB::table('tblwilayah')->where('id', $id)->update([
            'kode_wilayah' => $request->provinsi,
            'nm_wilayah' => $request->Wilayah,
            'updated_at' => $request->updated_at
        ]);
        return redirect('/wilayah_detail')->withSuccess('Data Wilayah Update Successfully!');
    }
}
