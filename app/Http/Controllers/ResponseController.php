<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Comment;
use App\Response;

class ResponseController extends Controller
{
    public function uploadReponse(Request $req) {
        $userlog = Auth::user();

        if ($userlog) {
            $response = new Response();

            $response->responses = $req["response-content"];
            $response->user_id = $userlog->id;
            $response->comment_id = $req["comment-response-id"];
            $response->save();

            return redirect("/inicio");
        } else {
            return redirect("/login");
        }
    }

    public function responseLikes(Request $req) {
        $response = Response::find($req["response-id-like"]);
        $acumulateResponseLikes = $req["counted-response-likes"] + $req["response-like"];
        $comment->likes = $acumulateResponseLikes;
        $comment->save();

        return back();
    }
}
