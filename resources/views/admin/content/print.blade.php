<html lang="en">
{{-- @dd($data) --}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Page</title>
    <style>
        /* Add your custom styles for printing here */
        body {
            font-family: Arial, sans-serif;
        }

        /* Example styling for a table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <!-- Replace the content below with your actual data -->
    <h1>Laporan Penjualan</h1>
    <p>Periode : {{ $tgl_awal }} s/d {{ $tgl_akhir }}</p>
    <p>Print by : {{ Auth::user()->nama }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No Telp</th>
                <th>Tanggal</th>
                <th>Studio</th>
                <th>Tema</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->customer->nama }}</td>
                    <td>{{ $item->customer->no_hp }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->tgl)) }}</td>
                    <td>{{ $item->studio->nama_studio }}</td>
                    <td>{{ $item->tema->nama_tema }}</td>
                    <td>{{ $item->transaksi->total_harga }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="6" style="text-align: right"><b>Total</b></td>
                </td>
                <td>{{ $total }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Add more content as needed -->

    <!-- JavaScript for printing -->
    <script>
        // Use JavaScript to trigger the print dialog when the page loads
        window.onload = function() {
            window.print();
            // Close the print window after printing (optional)
            window.onafterprint = function() {
                window.close();
            }
        }
    </script>

</body>

</html>
