<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('/home')->with('success', 'Login Berhasil');
        }
        return redirect('/')->with('error', 'Email Atau Password Salah');
    }

    public function register()
    {
        return view('user.register');
    }

    public function registerStore(Request $request)
    {
        User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'no_telp'    => $request->no_telp,
            'alamat'     => $request->alamat,
            'level'      => 'afiliasi',
            'password'   => hash::make($request->password),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('/register')->with('success', 'Akun Berhasil Dibuat Silahkan Chat Admin Untuk Verifikasi');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
