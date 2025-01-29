<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'laporan';

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }

    public function penilaian()
    {
        return $this->belongsTo(Penilaian::class, 'penilaian_id');
    }
}
