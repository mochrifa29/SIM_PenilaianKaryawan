<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use App\Models\Kriteria;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'Administrator',
            'password' => '12345678',
        ]);

        User::create([
            'name' => 'Kepala Produksi',
            'email' => 'kepala_produksi@gmail.com',
            'role' => 'Kepala Produksi',
            'password' => '12345678',
        ]);

        User::create([
            'name' => 'Manajer',
            'email' => 'manajer@gmail.com',
            'role' => 'Manajer',
            'password' => '12345678',
        ]);

        Kriteria::create([
            'kriteria' =>'Kehadiran',
            'bobot' => 20
        ]);

        Kriteria::create([
            'kriteria' => 'Produksi',
            'bobot' => 80
        ]);

        Karyawan::create([
            'nip' => '4324243',
            'nama' => 'Surya',
            'no_telpon' => '082315728130',
            'divisi' => 'Produksi',
            'Alamat' => 'Tasikmalaya',
        ]);

        Karyawan::create([
            'nip' => '4324243',
            'nama' => 'Andi',
            'no_telpon' => '082315728130',
            'divisi' => 'Produksi',
            'Alamat' => 'Tasikmalaya',
        ]);

        Karyawan::create([
            'nip' => '4324243',
            'nama' => 'Aziz',
            'no_telpon' => '082315728130',
            'divisi' => 'Produksi',
            'Alamat' => 'Tasikmalaya',
        ]);

        
    }
}
