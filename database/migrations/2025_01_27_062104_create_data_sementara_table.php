<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_sementara', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->references('id')->on('karyawan');
            $table->integer('absensi');
            $table->integer('produksi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_sementara');
    }
};
