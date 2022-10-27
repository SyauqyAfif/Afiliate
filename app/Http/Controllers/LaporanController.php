<?php

namespace App\Http\Controllers;

use App\Models\Afiliasi;
use PDF;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cetak_laporan()
    {
        $afiliasi = Afiliasi::all();
        return view('cetak.cetak_laporan', compact('afiliasi'));
    }

    public function cetaklaporan($dari, $sampai)
    {
        // dd($dari,$sampai);
        $laporan = Afiliasi::whereBetween('tanggal', [$dari, $sampai])->get();

        // dd($laporan);
        // $custume = array(0,0,800,800);
        $pdf = PDF::loadview('cetak.cetak', compact('laporan', 'dari', 'sampai'));
        return $pdf->stream('Laporan.pdf');
    }

    public function filter(Request $request, $tgl_awal, $tgl_akhir)
    {

        $awal = $request->tgl_awal;
        $akhir = $request->tgl_akhir;

        $afiliasi =  Afiliasi::whereBetween('created_at', [$awal, $akhir])->get();

        // dd($notaris);
        return view('cetak.filter', compact('afiliasi', 'awal', 'akhir'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
