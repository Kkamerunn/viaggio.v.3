<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    public function uploadComment(Request $req) {
        $userlog = Auth::user();

        if ($userlog) {
            $comment = new Comment();

            $comment->comments = $req["comment-content"];
            $comment->post_id = $req["post-comment-id"];
            $comment->user_id = $userlog->id;
            $comment->save();

            return redirect("/inicio");
        } else {
            return redirect("/login");
        }
    }

}
