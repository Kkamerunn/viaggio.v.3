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

        $peopleFollowed = Follower::where('follower_id', $userLogId)->get();

        $vac = compact('peopleFollowed');

        return view('personas_seguidas', $vac);
    }



}
