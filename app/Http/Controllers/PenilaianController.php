<?php

namespace App\Http\Controllers;

use App\Models\Data_sementara;
use App\Models\Karyawan;
use App\Models\Kriteria;
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
            'penilaian' =>Penilaian::groupBy('tanggal_penilaian')->get(),
            'divisi' =>Karyawan::groupBy('divisi')->get()
           ];

        return view('pages.penilaian.index',$data);
    }

    public function hitung_skor($tanggal){
        
      
        $data = Penilaian::where('tanggal_penilaian',$tanggal)->get();

        $kehadiran = Kriteria::where('kriteria','Kehadiran')->first();
        $produksi = Kriteria::where('kriteria','Produksi')->first();
        $bobot_k = $kehadiran->bobot/100; //0,2
        $bobot_p = $produksi->bobot/100; //0,8
        $skor=0;
        foreach ($data as $key => $value) {

          
                $skor =(($value->absensi * $bobot_k) + ($value->produksi * $bobot_p))/2;

                $status = $skor >= 80 ? 'Di Perpanjang' :'Tidak Di Perpanjang';
                
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

        return redirect('/laporan')->with('success', 'Data karyawan berhasil dinilai');


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
        $tanggal = Penilaian::where('id',$penilaian->id)->first();
        $data = [
            'title' => 'Detail Penilaian Karyawan',
            'tanggal' => $tanggal->tanggal_penilaian,
            'penilaian' => Penilaian::where('tanggal_penilaian',$tanggal->tanggal_penilaian)->get()
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
       
    }
}
