<?php

namespace Database\Seeders;

use App\Models\Karyawan;
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
            'password' => 'admin',
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
