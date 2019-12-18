<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class InicioController extends Controller
{

    public function init() {

        $posts = Post::all();
        $vac = compact('posts');

        return view('inicio', $vac);
    } 
    
    

}
