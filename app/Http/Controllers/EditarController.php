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
        
        $reglas = [
            "new-user-name" => "string|min:3|max:12",
            "new-avatar" => "mimes:jpeg,png,gif,svg",
            "new-pass" => "string|min:8"
        ];

        $mensajes = [
            "string" => "Este campo debe ser un texto",
            "min" => "El campo :attribute debe tener al menos :min caracteres",
            "max" => "El campo :attribute debe tener al menos :max caracteres",
            "mimes" => "El campo :attribute solo acepta imagenes de tipo :mimes"
        ];
        
        $this->validate($req, $reglas, $mensajes);
        
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
