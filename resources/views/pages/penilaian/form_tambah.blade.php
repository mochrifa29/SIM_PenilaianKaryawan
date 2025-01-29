@extends('layouts.main')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">{{ $title }}</h3>

        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">

                    <div class="card-body">
                        <form action="/tambah-keranjang" method="post">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="defaultSelect">Pilih Divisi</label>
                                        <select name="divisi" id="divisi" class="form-select form-control select2">
                                            <option value="">Pilih Divisi</option>
                                            @foreach ($divisi as $item)
                                                <option value="{{ $item->divisi }}">{{ $item->divisi }}</option>
                                            @endforeach
                                        </select>
                                        @error('divisi')
                                            <small id="emailHelp2" class="form-text text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="defaultSelect">Pilih Karyawan</label>
                                        <select id="karyawan_id" name="karyawan_id"
                                            class="form-select form-control select2">

                                        </select>
                                        @error('karyawan_id')
                                            <small id="emailHelp2" class="form-text text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email2">Kehadiran</label>
                                                <input type="text" value="{{ old('absensi') }}" class="form-control"
                                                    name="absensi" />
                                                @error('absensi')
                                                    <small id="emailHelp2"
                                                        class="form-text text-danger">{{ $message }}</small>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email2">Jumlah Produksi</label>
                                                <input type="text" class="form-control" name="produksi"
                                                    value="{{ old('produksi') }}" />
                                                @error('produksi')
                                                    <small id="emailHelp2"
                                                        class="form-text text-danger">{{ $message }}</small>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>






                                </div>


                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i>
                                        Tambahkan</button>
                                    <a href="/penilaian" class="btn btn-danger">Cancel</a>
                                </div>



                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">



                        <form action="/penilaian" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="tanggal_penilaian" />
                                        @error('tanggal_penilaian')
                                            <small id="emailHelp2" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-success mt-2">Submit</button>

                                </div>
                            </div>


                        </form>


                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Absensi</th>
                                        <th>Produksi</th>
                                        <th>Divisi</th>
                                        <th>action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($keranjang as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>{{ $item->karyawan->nama }}</td>
                                            <td>{{ $item->absensi }}</td>
                                            <td>{{ $item->produksi }}</td>
                                            <td>{{ $item->karyawan->divisi }}</td>
                                            <td>
                                                <form action="/hapusData_keranjang/{{ $item->id }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="border: none"
                                                        onclick="return confirm('Apakah anda yakin ingin menghapusnya?')"><i
                                                            class="fa fa-trash text-danger"></i></button>
                                                </form>
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
    <script>
        $(document).ready(function() {
            $("#divisi").change(function() {
                divisi = $(this).val();

                let token = $("meta[name='csrf-token']").attr("content")
                $.ajax({
                    type: "GET",
                    url: "/cek_karyawan/" + divisi,
                    data: {
                        "_token": token
                    },
                    success: function(response) {

                        baris = "";
                        for (let i = 0; i < response.length; i++) {
                            const element = response[i];
                            baris += '<option value="' + element.id + '">' + element
                                .nama +
                                '</option>';
                        }
                        $("#karyawan_id").html(baris);
                    }
                })
            })
        })
    </script>
@endsection
