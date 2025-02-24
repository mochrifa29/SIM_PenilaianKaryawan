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
                        <a href="/karyawan/create" class="btn btn-primary">Tambah Data</a>
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
                                        <th>Tanggal Masuk</th>
                                        <th>NIP</th>
                                        <th>Name</th>
                                        <th>No Telpon</th>
                                        <th>Divisi</th>
                                        <th>Alamat</th>
                                        <th>action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($karyawan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ date('d M Y', strtotime($item->tanggal_masuk)) }}</td>
                                            <td>{{ $item->nip }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->no_telpon }}</td>
                                            <td>{{ $item->divisi }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <form action="/karyawan/{{ $item->id }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" style="border: none"
                                                            onclick="return confirm('Apakah anda yakin ingin menghapusnya?')"><i
                                                                class="fa fa-trash text-danger"></i></button>
                                                    </form>

                                                    <a style="margin-left: 20px"
                                                        href="/karyawan/{{ $item->id }}/edit"><i
                                                            class="fa fa-edit text-warning"></i></a>
                                                </div>
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
