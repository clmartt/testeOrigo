<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorUser extends Controller
{
    public function apiLogin(Request $request){
        return $request->all();
    }
}
