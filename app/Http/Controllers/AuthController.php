<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (auth()->attempt($credentials)) {
            return redirect()->intended('/produk');
        }
        $error = "Username or password is invalid";
      return view('auth.login', compact('error'));
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $user = new \App\Models\User;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/');
    }

}
