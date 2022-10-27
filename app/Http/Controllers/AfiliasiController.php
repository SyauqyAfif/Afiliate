<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Afiliasi;

class AfiliasiController extends Controller
{
    public function index()
    {
        $afiliasi = Afiliasi::all();
        return view('program.data_afiliasi', compact('afiliasi'));
    }

    public function store(Request $request)
    {
        Afiliasi::create ([
            'nama_afiliasi'   => $request->nama_afiliasi,
            'no_telp'   => $request->no_telp,
            'alamat'   => $request->alamat,
            'email'   => $request->email,
            'tanggal'   => $request->tanggal,
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s'),
            
        ]);
        return redirect('/data_afiliasi')
        ->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $afiliasi = Afiliasi::find($id);
        $afiliasi->updated_at        = date('Y-m-d H:i:s');
        $afiliasi->nama_afiliasi         = $request->nama_afiliasi;
        $afiliasi->no_telp         = $request->no_telp;
        $afiliasi->alamat         = $request->alamat;
        $afiliasi->email         = $request->email;
        $afiliasi->tanggal         = $request->tanggal;
        $afiliasi->save();
        return redirect('/data_afiliasi')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $afiliasi = Afiliasi::find($id);
        $afiliasi->delete();
        return redirect('/data_afiliasi')->with('success', 'Data Berhasil Dihapus');
    }
}
