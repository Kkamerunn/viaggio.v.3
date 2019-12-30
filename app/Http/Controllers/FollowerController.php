<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Follower;

class FollowerController extends Controller
{
    public function follow(Request $req) {
        $userLog = Auth::user();

        if ($userLog) {
            
            $follower = new Follower();
            $follower->followed_id = $req["persona"]; 
            $follower->follower_id = $userLog->id;
            $follower->save();

            return redirect('/personas_seguidas');

        } else {
            return redirect('/welcome');
        }
    }

    public function following() {
        $userLog = Auth::user();

        $peopleFollowed = Follower::where($userLog->id, 'follower_id')
            ->orderBy('created_at')
            ->get();

        $vac = compact('peopleFollowed', 'userLog');

        return view('personas_seguidas', $vac);
    }

    public function followers() {
        $userLog = Auth::user();

        $followers = Follower::where($userLog->id, '==', 'followed_id')
            ->orderBy('created_at')
            ->get();

        $vac = compact('followers','userLog');

        return view('seguidores', $vac);
    }
}
