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
                        <form action="/user" method="post">
                            @csrf
                            <div class="row">


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
                                        <label for="email2">Email</label>
                                        <input type="text" value="{{ old('email') }}" class="form-control"
                                            name="email" />
                                        @error('email')
                                            <small id="emailHelp2" class="form-text text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="defaultSelect">Role</label>
                                        <select class="form-select form-control" name="role">
                                            <option value="">Plih Jabatan</option>
                                            <option value="Kepala Produksi">Kepala Produksi</option>
                                            <option value="Manajer">Manajer</option>
                                            <option value="Administrator">Administrator</option>
                                        </select>
                                        @error('role')
                                            <small id="emailHelp2" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email2">Password</label>
                                        <input type="password" class="form-control" name="password" />
                                        @error('password')
                                            <small id="emailHelp2" class="form-text text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="email2">Konfirmasi Password</label>
                                        <input type="password" class="form-control" name="password_conf" />
                                        @error('password_conf')
                                            <small id="emailHelp2" class="form-text text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>



                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a href="/user" class="btn btn-danger">Cancel</a>
                                </div>



                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
