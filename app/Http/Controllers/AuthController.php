<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register(){
        return view('register.index');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'confirm-password' => 'required|same:password'
        ]);
        $data = $request->except('confirm-password', 'password');
        $data['password'] = Hash::make($validate['password']);
        User::create($data);

        Session::flash('success_message', 'Akun berhasil terdaftar! Silakan masuk.');
        return redirect('/login')->with('success', 'Akun Berhasil Dibuat');
    }
    
    public function login()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Session::flash('success_message', 'Login berhasil');
 
            return redirect()->intended('/')->with('success', 'Selamat Datang ' . Auth::user()->username);
        }
 
        Session::flash('status', 'failed');
        Session::flash('message', 'Login Gagal!');

        return redirect('/login')->with('error', 'Email/Password Salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/')->with('success', 'Terima Kasih Telah Menggunakan BRINI :D');
    }
}
