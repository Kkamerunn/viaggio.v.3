<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function uploadPost(Request $req) {
        $post = new Post();

        $post->content = $req["post-content"];
        $post->save();
    }
}
