<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Unique;

date_default_timezone_set('Asia/Jakarta');

class UserController extends Controller
{
    public function user()
    {
        $user = User::all();
        return view('user.user', compact('user'));
    }

    public function store(Request $request)
    {
        User::create ([
            'name'        => $request->name,
            'level'       => $request->level,
            'email'       => $request->email,
            'no_telp'     => $request->no_telp,
            'alamat'      => $request->alamat,
            'password'    => hash::make($request->password),
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s'),
            
        ]);
        return redirect('/user')
        ->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->no_telp      = $request->no_telp;
        $user->alamat       = $request->alamat;
        $user->password     = hash::make($request->password);
        $user->level        = $request->level;
        $user->updated_at   = date('Y-m-d H:i:s');
        $user->save();
        return redirect('/user')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('success', 'Data Berhasil Dihapus');
    }
}
