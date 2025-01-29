<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Penilaian;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Dashboard',
            'users' => User::all()->count(),
            'karyawan' => Karyawan::all()->count(),
            'belum_dinilai' => Penilaian::where('status','Belum dinilai')->count(),
            'sudah_dinilai' => Penilaian::where('status','Sudah dinilai')->count()
        ];
        return view('pages.dashboard.dashboard',$data);
    }
}
