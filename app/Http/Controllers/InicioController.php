<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Comment;
use App\Response;


class InicioController extends Controller
{

    public function init() {

        $posts = Post::all();
        $comments = Comment::all();
        $responses = Response::all();
        $vac = compact('posts', 'comments', 'responses');

        return view('inicio', $vac);
    } 

    public function likes(Request $req) {
        $post = Post::find($req["postId"]);
        $acumulatePostLikes = $req["counted-likes"] + $req["post-like"];
        $post->likes = $acumulatePostLikes;
        $post->save();

        return back();
    }

}
