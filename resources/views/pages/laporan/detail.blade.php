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
                            <div class="col-10">
                                <h4>Tahun : {{ $periode }}</h4>
                            </div>
                            <div class="col-2">
                                <a href="/laporan" class="btn btn-warning text-white">Kembali</a>
                            </div>
                        </div>


                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Karyawan</th>
                                        <th>Kehadiran</th>
                                        <th>Produksi</th>
                                        <th>Skor</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($laporan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->penilaian->karyawan->nama }}</td>
                                            <td>{{ $item->penilaian->absensi }}</td>
                                            <td>{{ $item->penilaian->produksi }}</td>
                                            <td>{{ $item->skor }}</td>
                                            <td>
                                                @if ($item->status_karyawan == 'Di Perpanjang')
                                                    <span class="badge badge-success">{{ $item->status_karyawan }}</span>
                                                @endif
                                                @if ($item->status_karyawan == 'Tidak Di Perpanjang')
                                                    <span class="badge badge-danger">{{ $item->status_karyawan }}</span>
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
