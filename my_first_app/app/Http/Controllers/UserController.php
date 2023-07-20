<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

// erstellte Klasse mit unseren Methoden für Umgang mit dem User

class UserController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:15'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:30'],
        ]);

        //hashing password with integrated bcrypt function
        $data["password"] = bcrypt($data["password"]);
        
        //storing Userdata with integrated UserModel
        User::create($data);

        return 'Welcome '.$data['name'].'';
    }
}
