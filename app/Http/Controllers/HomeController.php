<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\ValidatedData;
use App\Models\User;


class HomeController extends Controller
{
    public function home()
    {
        return view('home.home');
    }

    //Ganti Password
    public function ganti_password()
    {
        return view('user.ganti_password');
    }
    public function ganti_password_aksi(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with("error", "Password Sekarang Tidak Sesuai!");
        }
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return redirect()->back()->with("error", "Password baru tidak boleh sama dengan password sekarang!");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("sukses", "Password berhasil diganti!");
    }

    public function profile()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('user.profile', compact('user'));
    }
    public function profile_aksi(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->no_telp  = $request->no_telp;
        $user->alamat   = $request->alamat;
        $user->update();

        return redirect()->back()->with('success', 'Profile Berhasil Diupdate');

    }
}
