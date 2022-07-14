@extends('layouts.users')

@section('title', 'Pesanan')

@section('content')
    <div class="card-header">
        <a href="{{ url('shopping') }}" class="btn btn-primary mb-3">Back</a>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('storage/foto-produk/' . $produk->gambar) }}" alt="" width="60%">
                </div>
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <form action="pesan/store" method="POST">
                            @csrf
                            <tr>
                                <td>nama</td>
                                <td>{{ $produk->nama_produk }}</td>
                            </tr>
                            <tr>
                                <td>Merek</td>
                                <td>{{ $produk->brand }}</td>
                            </tr>
                            <tr>
                                <td>ukuran</td>
                                <td>{{ $produk->ukuran }}</td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td>{{ $produk->harga }}</td>
                            </tr>
                            <tr>
                                <td>Jenis produk</td>
                                <td>{{ $produk->kategori->jenis_produk }}</td>
                            </tr>
                            <tr>
                                <td>pesan</td>
                                <td>
                                    <button type="submit" class="btn btn-info">Checkout</button>
                                </td>
                            </tr>
                        </form>
                    </table>
                    <hr>
                    <img src="https://cdn.shopify.com/s/files/1/0607/2841/0296/files/Guarantee_banner.png?v=1649666846"
                        alt="" width="90%">
                </div>
            </div>
        </div>
    </div>
@endsection
