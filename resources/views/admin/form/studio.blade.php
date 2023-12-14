@extends('admin.layout.template')
@push('title')
    <title>Studio</title>
@endpush
@section('content')
    <div class="content-header">
        <div class="container-fluid">
        </div>
    </div>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Form Studio</h3>
                    </div>
                    <form action="{{ $url_form }}" method="POST">
                        @isset($data)
                            @method('PUT')
                        @endisset
                        @csrf
                        <div class="card-body">
                            @isset($data)
                                <div class="form-group">
                                    <label>ID Studio</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ isset($data) ? $data->studio_id : '' }}">
                                </div>
                            @endisset
                            <div class="form-group">
                                <label>Nama Studio</label>
                                <input type="text" name="nama_studio"
                                    class="form-control @error('nama_studio') is-invalid @enderror"
                                    value="{{ isset($data) ? $data->nama_studio : '' }}">
                                @error('nama_studio')
                                    <span style="font-size:13px; color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kapasitas</label>
                                <input type="text" name="kapasitas"
                                    class="form-control @error('kapasitas') is-invalid @enderror"
                                    value="{{ isset($data) ? $data->kapasitas : '' }}">
                                @error('kapasitas')
                                    <span style="font-size:13px; color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" name="harga"
                                    class="form-control @error('harga') is-invalid @enderror"
                                    value="{{ isset($data) ? $data->harga : '' }}">
                                @error('harga')
                                    <span style="font-size:13px; color: red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-outline-dark">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
