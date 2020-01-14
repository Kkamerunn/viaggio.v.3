<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $guarded = [];

    public function postComment() {
        return $this->belongsTo("App\Post", "post_id");
    }

    public function userComment() {
        return $this->belongsTo("App\User", "user_id");
    }
}
