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
                        <form action="/karyawan" method="post">
                            <div class="row">
                                @csrf
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="email2">Nama</label>
                                        <input type="text" value="{{ old('nama') }}" class="form-control"
                                            name="nama" />
                                        @error('nama')
                                            <small id="emailHelp2" class="form-text text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="email2">No Telpon</label>
                                        <input type="text" value="{{ old('no_telpon') }}" class="form-control"
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
                                            value="{{ old('divisi') }}" />
                                        @error('divisi')
                                            <small id="emailHelp2" class="form-text text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="email2">NIP</label>
                                        <input type="text" value="{{ old('nip') }}" class="form-control"
                                            name="nip" />
                                        @error('nip')
                                            <small id="emailHelp2" class="form-text text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email2">Alamat</label>
                                        <input type="text" class="form-control" name="alamat"
                                            value="{{ old('alamat') }}" />
                                        @error('alamat')
                                            <small id="emailHelp2"
                                                class="form-text text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email2">Tanggal masuk</label>
                                        <input type="date" class="form-control" name="tanggal_masuk"
                                            value="{{ old('tanggal_masuk') }}" />
                                        @error('tanggal_masuk')
                                            <small id="emailHelp2"
                                                class="form-text text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
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
