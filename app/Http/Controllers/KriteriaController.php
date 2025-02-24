<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Kriteria',
            'kriteria' => Kriteria::all()
        ];
        return view('pages.kriteria.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Kriteria'
        ];
        return view('pages.kriteria.form_tambah',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kriteria' => 'required',
            'bobot' => 'required'
        ]);

        Kriteria::create([
            'kriteria' => $request->kriteria,
            'bobot' => $request->bobot,
        ]);

        return redirect('/kriteria')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = [
            'title' => 'Form Ubah Karyawan',
            'kriteria' => Kriteria::find($id)
        ];

        return view('pages.kriteria.form_ubah', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

        $request->validate([
            'kriteria' => 'required',
            'bobot' => 'required',
        ]);

        
        Kriteria::where('id',$id)->update([
            'kriteria'=> $request->kriteria,
            'bobot'         => $request->bobot
        ]);

        return redirect('/kriteria')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */

  
    public function destroy($id)
    {
        $Kriteria = Kriteria::find($id);
        $Kriteria->delete();
        return redirect('/kriteria')->with('success', 'Data Berhasil Dihapus');
    }
}
