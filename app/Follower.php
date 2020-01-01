<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    public $guarded = [];

    // Relacion con User
   
    public function seguidos() {
        return $this->belongsTo("App\User", "follower_id");
    }
}
