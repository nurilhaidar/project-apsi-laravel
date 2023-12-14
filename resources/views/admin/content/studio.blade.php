@extends('admin.layout.template')
@push('title')
    <title>Studio</title>
@endpush
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Studio</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Studio</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ url('dashboard/studio/create') }}" class="btn btn-outline-dark"><i
                                    class="fas fa-plus"></i>
                                Create</a>
                            <br>
                            <br>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Studio ID</th>
                                        <th>Studio</th>
                                        <th>Kapasitas</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->studio_id }}</td>
                                            <td>{{ $item->nama_studio }}</td>
                                            <td>{{ $item->kapasitas }}</td>
                                            <td>{{ $item->harga }}</td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{ url('dashboard/studio/' . $item->studio_id) }}"
                                                    class="btn btn-sm btn-warning" style="margin-right: 5px"><i
                                                        class="fas fa-pen" style="color: white"></i></a>
                                                <form action="{{ url('dashboard/studio/' . $item->studio_id) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="confirm('Anda yakin ingin menghapus ?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Studio ID</th>
                                        <th>Studio</th>
                                        <th>Kapasitas</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
