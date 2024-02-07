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

    //Show login form
    public function login(){
        return view('users.login');
    }

    //Authenticate users
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            
            return redirect('/')->with('message', 'User logged in successfully!');
        }

        return back()->withErrors(['email'=>'Invalid Input'])->onlyInput('email');
    }

    //Logout user
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You are logged out!');
    }

    //Show user profile page
    public function profile(){
        return view('users.profile');
    }
}
