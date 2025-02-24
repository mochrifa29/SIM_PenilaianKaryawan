@extends('layouts.main')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">{{ $title }}</h3>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <form action="/karyawan/{{ $karyawan->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email2">Nama</label>
                                        <input type="text" value="{{ $karyawan->nama }}" class="form-control"
                                            name="nama" />
                                        @error('nama')
                                            <small id="emailHelp2" class="form-text text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="email2">No Telpon</label>
                                        <input type="text" value="{{ $karyawan->no_telpon }}" class="form-control"
                                            name="no_telpon" />
                                        @error('no_telpon')
                                            <small id="emailHelp2" class="form-text text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email2">Divisi</label>
                                        <input type="text" class="form-control" name="divisi"
                                            value="{{ $karyawan->divisi }}" />
                                        @error('divisi')
                                            <small id="emailHelp2" class="form-text text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                 
                                    <div class="form-group">
                                        <label for="email2">Tanggal Masuk</label>
                                        <input type="date" class="form-control" name="tanggal_masuk"
                                            value="{{ $karyawan->tanggal_masuk }}" />
                                        @error('tanggal_masuk')
                                            <small id="emailHelp2" class="form-text text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email2">Alamat</label>
                                        <input type="text" class="form-control" name="alamat"
                                            value="{{ $karyawan->alamat }}" />
                                        @error('alamat')
                                            <small id="emailHelp2" class="form-text text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email2">NIP</label>
                                        <input type="text" class="form-control" name="nip"
                                            value="{{ $karyawan->nip }}" />
                                        @error('nip')
                                            <small id="emailHelp2" class="form-text text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a href="/karyawan" class="btn btn-danger">Cancel</a>
                                </div>



                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
