<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if($request->email == null || $request->password == null)
        {
            toast('Email and Password is required!','error');
            return back();
        }
 
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('dashboard');
        }
 
        toast('Login Failed! Check Email and Password','error');
        return back();
    }

    public function logout()
    {
        $auth = Auth::logout();
        toast('Logout Berhasil','success');
        return view('auth.login');
    }
}
