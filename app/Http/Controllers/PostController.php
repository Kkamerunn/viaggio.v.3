<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostController extends Controller
{
    public function uploadPost(Request $req) {

        $userlog = Auth::user();


        if ($userlog) {
            $post = new Post();

            $post->content = $req["post-content"];
            $post->user_id = $userlog->id;

            $post->save();

            return redirect("/inicio");    
        } else {
            return redirect("/login");
        }
    }
}
