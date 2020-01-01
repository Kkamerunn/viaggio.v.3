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
        $followerTab = Follower::all();

        if ($userLog) {
            
            foreach ($followerTab as $item) {
                if ($item->follower_id == $userLog->id && $item->followed_id == $req["persona"]) {
                    // completar esta funcion
                } else {
                    $follower = new Follower();
                    $follower->followed_id = $req["persona"]; 
                    $follower->follower_id = $userLog->id;
                    $follower->save();

                    return redirect('/personas_seguidas');
                }
            }

        } else {
            return redirect('/welcome');
        }
    }

        
    public function following() {
        
        $userLog = Auth::user();

        $peopleFollowed = Follower::all();

        $vac = compact("peopleFollowed", "userLog");

        return view("personas_seguidas", $vac);
    }



}
