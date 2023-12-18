@extends('admin.layout.template')
@push('title')
    <title>Order</title>
@endpush
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Order</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Order</li>
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
                        <div class="card-header">
                            <form action="{{ url('/dashboard/order') }}" method="GET">
                                <div class="row">
                                    <div class="col-2">
                                        <label for="tgl_awal">Tanggal Awal</label>
                                        <input type="date" id="tgl_awal" class="form-control" name="tgl_awal">
                                    </div>
                                    <div class="col-2">
                                        <label for="tgl_awal">Tanggal Akhir</label>
                                        <input type="date" id="tgl_akhir" class="form-control" name="tgl_akhir">
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-sm btn-outline-dark"
                                            style="margin-top: 35px"><i class="fas fa-search"></i></button>
                                        <button type="button" id="printButton" class="btn btn-sm btn-outline-dark"
                                            style="margin-top: 35px">
                                            <i class="fas fa-print"></i> Print
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Order ID</th>
                                        <th>Nama</th>
                                        <th>No Telp</th>
                                        <th>Tanggal</th>
                                        <th>Studio</th>
                                        <th>Tema</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->order_id }}</td>
                                            <td>{{ $item->customer->nama }}</td>
                                            <td>{{ $item->customer->no_hp }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->tgl)) }}</td>
                                            <td>{{ $item->studio->nama_studio }}</td>
                                            <td>{{ $item->tema->nama_tema }}</td>
                                            <td>{{ $item->transaksi->total_harga }}</td>
                                            <td>{{ $item->transaksi->status }}</td>
                                            <td class="text-center">
                                                <form action="{{ url('dashboard/order/' . $item->order_id) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="confirm('Anda yakin ingin menghapus order ini')"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>No Telp</th>
                                        <th>Tanggal</th>
                                        <th>Studio</th>
                                        <th>Tema</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
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

    <form id="printForm" action="{{ url('/dashboard/order/print') }}" method="GET" style="display: none;">
        <input type="hidden" id="print_tgl_awal" name="tgl_awal">
        <input type="hidden" id="print_tgl_akhir" name="tgl_akhir">
    </form>

    @push('script')
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#printButton').click(function() {
                    // Get values from the search form
                    var tgl_awal = $('#tgl_awal').val();
                    var tgl_akhir = $('#tgl_akhir').val();

                    // Construct the URL for printing
                    var printUrl = "{{ url('/dashboard/order/print') }}?" + $.param({
                        tgl_awal: tgl_awal,
                        tgl_akhir: tgl_akhir
                    });


                    // Navigate to the print URL
                    window.open(printUrl, '_blank');
                });
            });
        </script>
    @endpush
@endsection
