<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    public $guarded = [];

    public function responseComment() {
        return $this->belongsTo("App\Comment", "comment_id");
    }

    public function responseUser() {
        return $this->belongsTo("App\User", "user_id");
    }

}
