<html>

<head>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">

    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>

<body style="background-color: whitesmoke">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body p-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('img/LOGO.png') }}" width="100px">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <h5 class="text-center"><b>Receipt</b></h5>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table text-nowrap">
                                        <tbody>
                                            <tr>
                                                <td style="width: 150px">Nama</td>
                                                <td>:</td>
                                                <td>{{ $data->customer->nama }}</td>
                                            </tr>
                                            <tr>
                                                <td>No Hp</td>
                                                <td>:</td>
                                                <td>{{ $data->customer->no_hp }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal</td>
                                                <td>:</td>
                                                <td>{{ $tgl }}</td>
                                            </tr>
                                            @foreach ($jam as $item)
                                                @if ($loop->iteration == 1)
                                                    <tr>
                                                        <td>Jam</td>
                                                        <td>:</td>
                                                        <td>{{ $item->jam }}</td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>{{ $item->jam }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            <tr>
                                                <td>Total Bayar</td>
                                                <td>:</td>
                                                <td>{{ $data->transaksi->total_harga }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    <button class="btn btn-outline-danger"
                                                        style="margin-right: 50px">Batal</button>
                                                    <button class="btn btn-outline-dark">Bayar</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
