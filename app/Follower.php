<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    public $guarded = [];

    // Relacion con User
   
    /*
    public function followed() {
        return $this->belongsTo("App\User", "follower_id");
    }*/
    
    /*
    public function user() {
        return $this->belongsToMany("App\User", "followers", "followed_id", "follower_id");
    }*/

    public function follower() {
        return $this->belongsTo("App\User", "follower_id");
    }
    
    public function followed() {
        return $this->belongsTo("App\User", "followed_id");
    }

}
