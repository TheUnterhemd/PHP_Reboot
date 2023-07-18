<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:15'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:24'],
        ]);
        return 'Welcome '.$data['name'].'';
    }
}
