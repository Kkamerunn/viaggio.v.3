<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Comment;

class InicioController extends Controller
{

    public function init() {

        $posts = Post::all();
        $comments = Comment::all();
        $vac = compact('posts', 'comments');

        return view('inicio', $vac);
    } 

}
