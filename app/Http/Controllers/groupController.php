<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\vendor;

class groupController extends Controller
{
    public function grouplist()
    {
        $datagroup = DB::table('tblgroup')->get();
        $dataVendor = vendor::orderBy('nm_vendor', 'ASC')->get();
        $datawilayah = DB::table('tblarea')->get();
        return view('insert.addwp', compact('dataVendor', 'datagroup', 'datawilayah'));
    }
}
