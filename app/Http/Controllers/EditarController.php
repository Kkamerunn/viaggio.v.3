<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class EditarController extends Controller
{
    public function index() {
        $user = Auth::user();

        return view('editar', compact('user'));
    }

    public function editar(Request $req, $id) {
        $user = User::find($id);

        $path = $req->file("new-avatar")->store("public");
        $namePath = basename($path);

        $user->user_name = $req["new-user-name"];
        $user->avatar = $namePath;
        $user->password = bcrypt($req["new-pass"]);

        $user->save();

        return back();
    }
}
