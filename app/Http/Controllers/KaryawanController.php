<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Karyawan',
            'karyawan' => Karyawan::all()
        ];
        return view('pages.karyawan.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Form Tambah Karyawan'
        ];
        return view('pages.karyawan.form_tambah',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_masuk' => 'required',
            'nip' => 'required',
            'nama' => 'required',
            'no_telpon' => 'required|min:12',
            'divisi' => 'required',
            'alamat' => 'required',
        ]);

        Karyawan::create([
            'tanggal_masuk' => $request->tanggal_masuk,
            'nip' => $request->nip,
            'nama' => $request->nama,
            'no_telpon' => $request->no_telpon,
            'divisi' => $request->divisi,
            'alamat' => $request->alamat,
        ]);

        return redirect('/karyawan')->with('success', 'Data Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        $data = [
            'title' => 'Form Ubah Karyawan',
            'karyawan' => Karyawan::find($karyawan->id)
        ];

        return view('pages.karyawan.form_ubah', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {

        $request->validate([
            'tanggal_masuk' => 'required',
            'nip' => 'required',
            'nama' => 'required', 
            'no_telpon' => 'required',
            'divisi' => 'required',
            'alamat' => 'required',
        ]);

        
        Karyawan::where('id',$karyawan->id)->update([
            'tanggal_masuk'=> $request->tanggal_masuk,
            'nip'         => $request->nip,
            'nama'         => $request->nama,
            'no_telpon'    => $request->no_telpon,
            'divisi'       => $request->divisi,
            'alamat'       => $request->alamat
        ]);

        return redirect('/karyawan')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan = Karyawan::find($karyawan->id);
        $karyawan->delete();
        return redirect('/karyawan')->with('success', 'Data Berhasil Dihapus');
    }
}
