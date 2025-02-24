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
                        @can('kepala_produksi')
                            <a href="/penilaian/create" class="btn btn-primary">Form Penilaian</a>
                        @endcan


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
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($penilaian as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ date('d M Y', strtotime($item->tanggal_penilaian)) }}</td>
                                            <td>
                                                @if ($item->status == 'Belum dinilai')
                                                    <span class="badge badge-danger">{{ $item->status }}</span>
                                                @elseif ($item->status == 'Sudah dinilai')
                                                    <span class="badge badge-success">{{ $item->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/penilaian/{{ $item->id }}"
                                                    class="btn btn-success btn-sm">detail</a>
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
