<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\User;

class PerfilController extends Controller
{
    public function show($id) {

        $userLog = User::find($id);   

        $posts = Post::where('user_id', $id)->get();

        $vac = compact('posts', 'userLog');

        return view('perfil', $vac);
    }

}
