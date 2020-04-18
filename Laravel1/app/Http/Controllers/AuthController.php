<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function postRegister(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);

        return view('auth.login');
    }
    public function postLogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){

            return redirect('/');

        }
        // Message salah
        return redirect('/login')->with('errors', 'Username atau Password anda Salah!');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}