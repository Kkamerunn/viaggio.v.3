<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    public $guarded = [];

    // Relacion con User

    public function followed() {
        return $this->belongsTo("App\User", "follower_id");
    }

}
