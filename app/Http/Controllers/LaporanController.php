<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

        $data = [
            'title' => 'Laporan Penilaian',
            'laporan' => Laporan::groupBy('tanggal')->get(),
            'tahun' => Laporan::whereYear('tanggal',date('Y'))->groupBy('tanggal')->get()
           ];

        return view('pages.laporan.index',$data);
    }

    public function cetak_laporan($tanggal){

        $data = [
            'laporan' => Laporan::where('tanggal',$tanggal)->get(),
            'tanggal' => Laporan::where('tanggal',$tanggal)->groupBy('tanggal')->first()
           
        ];
        $pdf = FacadePdf::loadView('pages/laporan/cetak_pdf',$data);
 
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Laporan $laporan)
    {
        $tanggal = Laporan::where('id',$laporan->id)->first();
        $data = [
            'title' => 'Detail Laporan Penilaian',
            'tanggal' => $tanggal->tanggal,
            'laporan' => Laporan::where('tanggal',$tanggal->tanggal)->get()
        ];

        return view('pages.laporan.detail',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laporan $laporan)
    {
        //
    }
}
