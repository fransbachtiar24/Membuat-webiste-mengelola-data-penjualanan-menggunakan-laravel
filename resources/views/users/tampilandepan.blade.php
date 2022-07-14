@extends('layouts.users')

@section('title', 'Mocco Store')

@section('content')
    <div class="container-fluid py-5">
        <div class="container">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <a href="{{ url('shopping') }}">
                        <div class="carousel-item active">
                            <img src="{{ asset('assets/images/user/Erigo1.png') }}" class="d-block w-100 efek-img"
                                alt="Gamabar Tidak Ditemukan">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/images/user/Erigo2.png') }}" class="d-block w-100 efek-img"
                                alt="Gambar Masih Memuat">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/images/user/Erigo3.png') }}" class="d-block w-100 efek-img"
                                alt="Gagal Menampilkan Gambar">
                        </div>
                    </a>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <a href="{{ url('shopping') }}">
                        <div class="carousel-item active">
                            <img src="{{ asset('assets/images/user/Erigo-s.png') }}" class="d-block w-100 efek-imgs"
                                alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/images/user/Erigo-x.png') }}" class="d-block w-100 efek-imgs"
                                alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/images/user/Erigo-y.png') }}" class="d-block w-100 efek-imgs"
                                alt="...">
                        </div>
                    </a>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container img-box">
            <a href=""><img src="{{ asset('assets/images/user/Erigo-col.png') }}" class="efek-imgs" width="100%"
                    style="padding-left: 25%;"></a>
            <h2 class="bannerstyle" style="font-size: 70px; color: #232323;">
                <span style="background-color: #232323;"></span>
                <span class="text-right">STEAL THE LOOK</span>
            </h2>
        </div>
        <div class="container-fluid">
            <div class="container careless">
                <p style="font-size: 20px; color: #232323;">
                    <span>COMPLETE YOUR STYLE</span>
                </p>
            </div>
        </div>
    @endsection
