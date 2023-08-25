<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    function RoleAdmin(){
        return redirect('/admin');
    }
    function RoleOperator(){
        return redirect('/');
    }
}
