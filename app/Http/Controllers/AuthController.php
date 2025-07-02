<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->route('dashboard');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}

