<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    public $guarded = [];

    public function postUser() {
        return $this->belongsTo("App\User", "user_id");
    }

    public function postComment() {
        return $this->hasMany("App\Comment", "post_id");
    }
}
