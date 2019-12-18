<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class InicioController extends Controller
{
    public function init() {
        return view('inicio');
    }    
}
