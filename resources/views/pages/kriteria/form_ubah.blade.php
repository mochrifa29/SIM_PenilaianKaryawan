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
                        <form action="/kriteria/{{ $kriteria->id }}" method="post">
                            <div class="row">
                                @csrf
                                @method('PUT')
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label for="email2">Kriteria</label>
                                        <input type="text" value="{{ $kriteria->kriteria }}" class="form-control"
                                            name="kriteria" />
                                        @error('kriteria')
                                            <small id="emailHelp2" class="form-text text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="email2">Bobot</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" name="bobot" value="{{ $kriteria->bobot }}"
                                                        class="form-control" aria-describedby="basic-addon2" />
                                                    <span class="input-group-text">%</span>
                                                </div>
                                                @error('bobot')
                                                    <small id="emailHelp2"
                                                        class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>


                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a href="/kriteria" class="btn btn-danger">Cancel</a>
                                </div>



                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
