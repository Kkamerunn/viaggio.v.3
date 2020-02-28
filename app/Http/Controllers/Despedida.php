<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Despedida extends Controller
{
    
    public function __invoke() 
    {
        return view('despedida', ['despedida' => 'Gracias por navegar en nuestra página, vuelve pronto!!'] );
    }

}
