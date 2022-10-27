<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fee;

class FeeController extends Controller
{
    public function index()
    {
        $fee = Fee::all();
        return view('program.fee', compact('fee'));
    }

    public function store(Request $request)
    {
        Fee::create ([
            'jenis_fee'   => $request->jenis_fee,
            'nominal'     => $request->nominal,
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s'),
            
        ]);
        return redirect('/fee')
        ->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $fee = Fee::find($id);
        $fee->jenis_fee         = $request->jenis_fee;
        $fee->nominal           = $request->nominal;
        $fee->updated_at        = date('Y-m-d H:i:s');
        $fee->save();
        return redirect('/fee')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $fee = Fee::find($id);
        $fee->delete();
        return redirect('/fee')->with('success', 'Data Berhasil Dihapus');
    }
}
