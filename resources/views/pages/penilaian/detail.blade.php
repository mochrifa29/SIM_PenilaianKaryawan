@extends('layouts.main')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">{{ $title }}</h3>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h4>Tanggal : {{ date('d M Y', strtotime($tanggal)) }}</h4>
                            </div>
                            <div class="col-4">
                                <a href="/penilaian" class="btn btn-warning text-white">Kembali</a>
                                @can('manajer')
                                    <a href="/hitung/{{ $tanggal }}" class="btn btn-primary">Hitung Semua</a>
                                @endcan

                            </div>
                        </div>


                    </div>
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success mb-3" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Karyawan</th>
                                        <th>Kehadiran</th>
                                        <th>Produksi</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($penilaian as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->karyawan->nama }}</td>
                                            <td>{{ $item->absensi }}</td>
                                            <td>{{ $item->produksi }}</td>
                                            <td>
                                                @if ($item->status == 'Belum dinilai')
                                                    <span class="badge badge-danger">{{ $item->status }}</span>
                                                @elseif ($item->status == 'Sudah dinilai')
                                                    <span class="badge badge-success">{{ $item->status }}</span>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
