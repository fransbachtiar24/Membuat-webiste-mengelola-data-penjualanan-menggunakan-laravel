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
            background-color: #140c53;
            color: white;
        }
    </style>
</head>

<body>

    <h1 style="text-align: center">DATA PRODUK</h1>

    <table id="customers">
        <tr>
            <th scope="col" style="text-align: center">No</th>
            <th style="text-align: center">Nama Produk</th>
            <th style="text-align: center">Brand</th>
            <th style="text-align: center">Jenis Produk</th>
            <th style="text-align: center">Ukuran</th>
            <th style="text-align: center">Jenis Kelamin</th>
            <th style="text-align: center">Stok</th>
            <th style="text-align: center">Harga</th>
        </tr>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->nama_produk }}</td>
                    <td>{{ $item->brand }}</td>
                    <td>{{ $item->kategori->jenis_produk }}</td>
                    <td>{{ $item->ukuran }}</td>
                    <td>{{ $item->gender }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>{{ number_format($item->harga) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
