<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class TblareaController extends Controller
{
    public function DataArea()
    {
        $DataDetailArea = DB::table('tblarea')->get();
        return view('insert.addwilayah', ['tblarea' => $DataDetailArea]);
    }
}
