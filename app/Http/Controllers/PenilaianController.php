<?php

namespace App\Http\Controllers;

use App\Models\Data_sementara;
use App\Models\Karyawan;
use App\Models\Laporan;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       

        $data = [
            'title' => 'Penilaian',
            'penilaian' =>Penilaian::groupBy(DB::raw('YEAR(tanggal_penilaian)'))->get(),
            'divisi' =>Karyawan::groupBy('divisi')->get()
           ];

        return view('pages.penilaian.index',$data);
    }

    public function hitung_skor($tahun){
        
        $data = Penilaian::whereYear('tanggal_penilaian',$tahun)->get();
        $skor=0;
        foreach ($data as $key => $value) {
              $skor = ($value->absensi + $value->produksi)/2;
              $status = $skor >= 26 ? 'Di Perpanjang' : 'Tidak Di Perpanjang';
              Laporan::create([
                'tanggal' => $value->tanggal_penilaian,
                'penilaian_id' => $value->id,
                'skor' => $skor,
                'status_karyawan' => $status
              ]);

              Penilaian::where('id',$value->id)->update([
                'status' => 'Sudah dinilai'
              ]);
        }

        return redirect('/laporan')->with('success', 'Data Karyawan Berhasil Dinilai');


    }

   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Form Penilaian',
            'karyawan' => Karyawan::all(),
            'keranjang' => Data_sementara::all(),
            'divisi' => DB::table('karyawan')
                            ->select('divisi')
                            ->groupBy('divisi')->get()
        ];
        return view('pages.penilaian.form_tambah',$data);
    }

    public function cek_karyawan($divisi)
    {
        $data = Karyawan::where('divisi', $divisi)->get();
        return response()->json($data);
    }

    public function TambahKeranjang_penilaian(Request $request){
        $request->validate([
            'divisi' => 'required',
            'karyawan_id' => 'required|unique:data_sementara',
            'absensi' => 'required',
            'produksi' => 'required',
        ]);

       $periode_id = $request->periode_id;
        Data_sementara::create([
            'karyawan_id' => $request->karyawan_id,
            'absensi' => $request->absensi,
            'produksi' => $request->produksi,
        ]);

        return redirect('/penilaian/create'.$periode_id)->with('success', 'Data Berhasil Ditambahkan');
    }

    public function hapusData_keranjang($id){
        $keranjang = Data_sementara::find($id);
        $keranjang->delete();
        return redirect('/penilaian/create')->with('success', 'Data Berhasil Dihapus');
    }

   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_penilaian' => 'required',
        ]);
        $data_keranjang = Data_sementara::all();
        foreach ($data_keranjang as $key => $value) {
            Penilaian::create([
                'karyawan_id' => $value->karyawan_id,
                'absensi' => $value->absensi,
                'produksi' => $value->produksi,
                'status' => 'Belum dinilai',
                'tanggal_penilaian' => $request->tanggal_penilaian,
            ]);
        }
        Data_sementara::truncate();

        return redirect('/penilaian')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penilaian $penilaian)
    {
        $periode = Penilaian::where('id',$penilaian->id)->first();
        $tanggal = date('Y', strtotime($periode->tanggal_penilaian));
        $data = [
            'title' => 'Detail Penilaian Karyawan',
            'periode' => $tanggal,
            'penilaian' => Penilaian::whereYear('tanggal_penilaian',$tanggal)->get()
        ];

        return view('pages.penilaian.detail',$data);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penilaian $penilaian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penilaian $penilaian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penilaian $penilaian)
    {
        //
    }
}
