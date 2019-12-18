<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\User;

class PerfilController extends Controller
{
    public function show() {

        $userLog = Auth::user();   

        $posts = Post::all();

        $vac = compact('posts', 'userLog');

        return view('perfil', $vac);
    }
}
