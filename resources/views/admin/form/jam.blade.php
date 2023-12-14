@extends('admin.layout.template')
@push('title')
    <title>Jam</title>
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
                        <h3 class="card-title">Form Jam</h3>
                    </div>
                    <form action="{{ $url_form }}" method="POST">
                        @isset($data)
                            @method('PUT')
                        @endisset
                        @csrf
                        <div class="card-body">
                            @isset($data)
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ID Jam</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ isset($data) ? $data->order_jam_id : '' }}">
                                </div>
                            @endisset
                            <div class="form-group">
                                <label>Jam</label>
                                <input type="text" name="jam" class="form-control @error('jam') is-invalid @enderror"
                                    value="{{ isset($data) ? $data->jam : '' }}">
                                @error('jam')
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
