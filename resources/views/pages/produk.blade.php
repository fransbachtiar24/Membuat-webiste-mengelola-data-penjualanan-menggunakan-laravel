@extends('layouts.master')

@section('title', 'Produk')

@section('name', 'Produk')

@section('content')
    <link href="{{ asset('assets/css/aturan.css') }}" rel="stylesheet" type="text/css" />
    <div class="layout-width">
        <div class="card py-1">
            <div class="text-center font-weight-bold py-5">
                <h1>Kategori</h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col m-4 img-area efek-img">
                        <a href="{{ url('produkbaju') }}">
                            <img src="https://cdn.shopify.com/s/files/1/0607/2841/0296/files/tshirt.jpg?v=1643179863"
                                alt="Tidak Bisa Memuat Gambar" width="75%">
                            <div class="img-text">
                                <h3 class="text-center text-light">T-shirt</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col m-auto img-area efek-img">
                        <a href="https://erigostore.co.id/collections/jacket">
                            <img src="https://cdn.shopify.com/s/files/1/0607/2841/0296/files/jacket.jpg?v=1643179863"
                                alt="Tidak Bisa Memuat Gambar" width="75%" class="efek-img">
                            <div class="img-text">
                                <h3 class="text-center text-light">Jacket</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col m-auto img-area efek-img">
                        <a href="https://erigostore.co.id/collections/shirt-flannel">
                            <img src="https://cdn.shopify.com/s/files/1/0607/2841/0296/files/shirt.jpg?v=1643179863"
                                alt="Tidak Bisa Memuat Gambar" width="75%">
                            <div class="img-text">
                                <h3 class="text-center text-light">Shirt</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col m-4 img-area efek-img">
                        <a href="https://erigostore.co.id/collections/t-shirt">
                            <img src="https://cdn.shopify.com/s/files/1/0607/2841/0296/files/pants.jpg?v=1643179863"
                                alt="Tidak Bisa Memuat Gambar" width="75%">
                            <div class="img-text">
                                <h3 class="text-center text-light">Pants</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col m-auto img-area efek-img">
                        <a href="https://erigostore.co.id/collections/jacket">
                            <img src="https://cdn.shopify.com/s/files/1/0607/2841/0296/files/bags.jpg?v=1643179863"
                                alt="Tidak Bisa Memuat Gambar" width="75%">
                            <div class="img-text">
                                <h3 class="text-center text-light">Bags</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col m-auto img-area efek-img">
                        <a href="https://erigostore.co.id/collections/shirt-flannel">
                            <img src="https://cdn.shopify.com/s/files/1/0607/2841/0296/files/socks.jpg?v=1643179863"
                                alt="Tidak Bisa Memuat Gambar" width="75%">
                            <div class="img-text">
                                <h3 class="text-center text-light">Socks</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="text-center py-5">
                    <!-- Dark Dropdowns -->
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Produk Lainnya
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item active" href="#">Sepatu</a></li>
                            <li><a class="dropdown-item" href="#">Topi</a></li>
                            <li><a class="dropdown-item" href="#">Hoddie</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
