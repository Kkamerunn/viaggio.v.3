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

            return back();
        } else {
            return redirect("/login");
        }
    }

    public function commentLikes(Request $req) {
        $comment = Comment::find($req["comment-id-like"]);
        $acumulateCommentLikes = $req["counted-comment-likes"] + $req["comment-like"];
        $comment->likes = $acumulateCommentLikes;
        $comment->save();

        return back();
    }

}
