<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class RegisUserController extends Controller
{
    public function UserDetail(){
        $DataUser = DB::table('users')->get();
        return view('Detail_User', ['users' => $DataUser]);
    }
    public function store(Request $request){
        $request->validate([
            'Email' => 'required|unique:users,email',
            'Nama' => 'required',
            'Role' => 'required',
            'Password' => 'required',
        ]);
        DB::table('users')->insert([
            'name' => Str::of($request->Nama)->upper(),
            'email' => $request->Email,
            'role' => $request->Role,
            'password' => bcrypt($request->Password),
            'created_at' => $request->created_at,
        ]);
        return redirect('/DetailUser')->withSuccess('Data Created Successfully!');
    }
}
