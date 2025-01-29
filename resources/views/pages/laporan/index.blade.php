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
                                        <th>Tanggal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($laporan as $item)
                                        <tr>
                                            <td>{{ date('Y', strtotime($item->tanggal)) }}</td>
                                            <td>
                                                <a href="/laporan/{{ $item->id }}" class="btn btn-success ">detail</a>

                                                <a class="btn btn-primary" target="_blank"
                                                    href="/cetak_laporan/{{ $item->tanggal }}">cetak
                                                    pdf</a>
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

    <!-- Modal -->
    <div class="modal fade" id="cetakModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">
                        Cetak Laporan
                    </h5>

                    <button type="button" class="close" id="btn-close-icon" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Pilih Tahun</label>
                                    <select name="tahun" id="tahun" class="form-select form-control">
                                        @foreach ($tahun as $item)
                                            <option value="{{ $item->tanggal }}">{{ date('Y', strtotime($item->tanggal)) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" id="btn-cetak" class="btn btn-primary">
                        Add
                    </button>
                    <button type="button" class="btn btn-danger" id="btn-close">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#btn-close").click(function() {
            $("#cetakModal").modal('hide');
        })

        $("#btn-close-icon").click(function() {
            $("#cetakModal").modal('hide');
        })
        // simpan
        $("#btn-cetak").click(function() {

            $tahun = $("#tahun").val()

            $.ajax({
                type: "GET",
                url: "/cetak_laporan/" + $tahun,
                cache: false,
                success: function(response) {


                },

            })
        })
    </script>
@endsection
