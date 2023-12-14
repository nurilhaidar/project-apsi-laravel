@extends('admin.layout.template')
@push('title')
    <title>User</title>
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
                        <h3 class="card-title">Form User</h3>
                    </div>
                    <form action="{{ $url_form }}" method="POST">
                        @isset($data)
                            @method('PUT')
                        @endisset
                        @csrf
                        <div class="card-body">
                            @isset($data)
                                <div class="form-group">
                                    <label>ID User</label>
                                    <input type="text" class="form-control" disabled
                                        value="{{ isset($data) ? $data->id : '' }}">
                                </div>
                            @endisset
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    value="{{ isset($data) ? $data->nama : '' }}">
                                @error('nama')
                                    <span style="font-size:13px; color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username"
                                    class="form-control @error('username') is-invalid @enderror"
                                    value="{{ isset($data) ? $data->username : '' }}">
                                @error('username')
                                    <span style="font-size:13px; color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    value="{{ isset($data) ? $data->password : '' }}">
                                @error('password')
                                    <span style="font-size:13px; color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value=""></option>
                                    <option value="0"
                                        @isset($data){{ $data->status == 0 ? 'selected' : '' }}@endisset>
                                        Admin</option>
                                    <option value="1"
                                        @isset($data){{ $data->status == 1 ? 'selected' : '' }}@endisset>
                                        Super Admin</option>
                                </select>
                                @error('status')
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
