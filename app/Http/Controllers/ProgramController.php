<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Jp;

class ProgramController extends Controller
{
    public function index()
    {
        $jp = jp::all();
        $program = Program::with('jp')->get();
        return view('program.data_program', compact('program','jp'));
    }

   
    public function store(Request $request)
    {
        
        Program::create ([
            'nama_program'   => $request->nama_program,
            'jp'   => $request->jp,
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s'),
            
        ]);
        return redirect('/data_program')
        ->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $program = Program::find($id);
        $program->nama_program         = $request->nama_program;
        $program->jp         = $request->jp;
        $program->updated_at        = date('Y-m-d H:i:s');
        $program->save();
        return redirect('/data_program')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $program = Program::find($id);
        $program->delete();
        return redirect('/data_program')->with('success', 'Data Berhasil Dihapus');
    }
}
