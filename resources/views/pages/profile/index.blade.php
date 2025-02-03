@extends('layouts.main')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">{{ $title }}</h3>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="table-responsive">
                                    <table>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td>{{ $profile->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td>{{ $profile->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Role</td>
                                            <td>:</td>
                                            <td>{{ $profile->role }}</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                            <div class="col-7">
                                <form action="/ubah_password/{{ $profile->email }}" method="get">
                                    <div class="form-group">
                                        <label for="email2">Masukan Password Baru</label>
                                        <input type="password" class="form-control" name="password_baru"
                                            value="{{ old('password_baru') }}" />
                                        @error('password_baru')
                                            <small id="emailHelp2" class="form-text text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Ganti Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
