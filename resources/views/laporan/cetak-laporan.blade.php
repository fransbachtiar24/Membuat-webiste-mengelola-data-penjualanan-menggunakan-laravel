<!DOCTYPE html>
<html>

<head>
    <title>Cetak Document</title>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <h1 style="text-align: center">Laporan Penjualan</h1>
    <p style="text-align: center">Periode: <span id="tanggal"></span></p>

    <table id="customers">
        <tr>
            <th scope="col" style="text-align: center">No</th>
            <th style="text-align: center">Tanggal</th>
            <th style="text-align: center">Nama Pelanggan</th>
            <th style="text-align: center">Brand</th>
            <th style="text-align: center">Jenis Produk</th>
            <th style="text-align: center">Ukuran</th>
            <th style="text-align: center">Jenis Kelamin</th>
            <th style="text-align: center">Jumlah Pesanan</th>
            <th style="text-align: center">Harga</th>
            <th style="text-align: center">Total Harga</th>
        </tr>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->nama_pelanggan }}</td>
                    <td>{{ $item->brand }}</td>
                    <td>{{ $item->jenis_produk }}</td>
                    <td>{{ $item->ukuran }}</td>
                    <td>{{ $item->gender }}</td>
                    <td>{{ $item->jumlah_pesan }}</td>
                    <td>Rp. {{ number_format($item->harga) }}</td>
                    <td>Rp. {{ number_format($item->total_harga) }}</td>
                </tr>
            @endforeach
            @foreach ($pendapatan as $item)
                <tr>
                    <td colspan="9" align="right"><strong>Pendapatan : </strong></td>
                    <td><strong>Rp. {{ number_format($item->pendapatan) }}</strong></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script type="text/javascript">
        var dt = new Date();
        document.getElementById("tanggal").innerHTML = dt.toLocaleDateString();
        window.print();
    </script>
</body>

</html>
