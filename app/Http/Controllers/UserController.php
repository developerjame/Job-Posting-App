<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Show register form
    public function create(){
        return view('users.register');
    }

    //Store and create user
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required|min:6|confirmed'
        ]);

        //Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //Create user
       $user = User::create($formFields);

        //login user
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in successfully!');
    }
}
