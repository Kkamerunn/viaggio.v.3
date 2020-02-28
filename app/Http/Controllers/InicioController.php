<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Comment;
use App\Response;
use Cookie;


class InicioController extends Controller
{

    public function init() {

        $posts = Post::all();
        $comments = Comment::all();
        $responses = Response::all();
        $vac = compact('posts', 'comments', 'responses');
        Cookie::queue('cookie1', 'vitamina D', 80);

        return response(view('inicio', $vac))->cookie('cookie2', 'vitamina C', 80);
    } 

    public function likes(Request $req) {
        $post = Post::find($req["postId"]);
        $acumulatePostLikes = $req["counted-likes"] + $req["post-like"];
        $post->likes = $acumulatePostLikes;
        $post->save();

        return back();
    }

}
