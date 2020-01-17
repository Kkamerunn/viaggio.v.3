<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Follower;
use App\User;

class FollowerController extends Controller
{
    public function follow(Request $req) {
        $userLog = Auth::user();
        $userLogId = $userLog->id;
        $followerTab = Follower::where('follower_id', $userLogId)->get();
        

        if ($userLog) {

            if ($followerTab == null) {
                $follower = new Follower();
                $follower->followed_id = $req["persona"]; 
                $follower->followed_name = $req["name-persona"];
                $follower->followed_user_name = $req["user-name-persona"];
                $follower->followed_avatar =$req["avatar-persona"];
                $follower->follower_id = $userLogId;
                $follower->save();

                return redirect('/personas_seguidas');
            } else { 
                foreach ($followerTab as $item) {
                    if ($item->followed_id != $req["persona"]) {
                        continue;
                    } else {
                        return;
                    }
                }
                $follower = new Follower();
                $follower->followed_id = $req["persona"]; 
                $follower->followed_name = $req["name-persona"];
                $follower->followed_user_name = $req["user-name-persona"];
                $follower->followed_avatar =$req["avatar-persona"];
                $follower->follower_id = $userLogId;
                $follower->save();

                return redirect('/personas_seguidas');
            }

        } else {
            return redirect('/welcome');
        }
    }

        
    public function following() {
        
        $userLog = Auth::user();
        $userLogId = $userLog->id;
        
        //$followers = Follower::all();
        $followers = Follower::where('follower_id', $userLogId)->get(); 

        $vac = compact('userLog');

        return view('personas_seguidas', $vac);
    }

    public function followers() {

        $userLog = Auth::user();
        $userLogId = $userLog->id;
        $follower = Follower::where('followed_id', $userLogId)->get();
        
        $vac = compact('userLog');

        return view('seguidores', $vac);
    }

}
