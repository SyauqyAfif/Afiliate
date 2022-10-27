<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jp;

class JpController extends Controller
{
    public function index()
    {
        $jp = Jp::all();
        return view('program.jp', compact('jp'));
    }

    public function store(Request $request)
    {
        Jp::create ([
            'jp'    => $request->jp,
            'created_at'       => date('Y-m-d H:i:s'),
            'updated_at'       => date('Y-m-d H:i:s'),
            
        ]);
        return redirect('/jp')
        ->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $jp = Jp::find($id);
        $jp->jp         = $request->jp;
        $jp->updated_at   = date('Y-m-d H:i:s');
        $jp->save();
        return redirect('/jp')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $jp = Jp::find($id);
        $jp->delete();
        return redirect('/jp')->with('success', 'Data Berhasil Dihapus');
    }
}
