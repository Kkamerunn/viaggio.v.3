<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_name', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relacion con posts -> uno a muchos

    public function myPost() {
        return $this->hasMany("App\Post", "user_id");
    }

    // Relacion con followers -> muchos a muchos
     
    public function followers() {
        return $this->belongsToMany("App\User", "followers", "followed_id", "follower_id");
    }

    public function followed() {
        return $this->belongsToMany("App\User", "followers", "follower_id", "followed_id");
    }
    
    public function myComment() {
        return $this->hasMany("App\Comment", "user_id");
    }

    public function myResponse() {
        return $this->hasMany("App\Response", "user_id");
    }

}
