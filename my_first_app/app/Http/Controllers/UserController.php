<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

// erstellte Klasse mit unseren Methoden für Umgang mit dem User

class UserController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:15'],
            //Rule class imported and pointed to Table users Row email to check if email is unique
            'email' => ['required', 'email', Rule::unique('users','email')],
            'password' => ['required', 'min:8', 'max:30'],
        ]);

        //hashing password with integrated bcrypt function
        $data["password"] = bcrypt($data["password"]);
        
        //storing Userdata with integrated UserModel
        $user = User::create($data);
        //login user with integrated Auth function and login method
        auth()->login($user);
        // after login redirect User to login page
        return redirect('/');

        //return 'Welcome '.$data['name'].'';
    }
    //easy logout method due integrated Auth function
    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    //simple login method and refreshing session with integrated modules
    public function login(Request $request){
        $data = $request->validate([
            'loginEmail' => 'required',
            'loginPassword' => 'required'
        ]);
        //checking DB for sended data
        if(auth()->attempt(['email' => $data['loginEmail'], 'password' => $data['loginPassword']])){
            $request->session()->regenerate();
        }
        return redirect('/');
    }
}
