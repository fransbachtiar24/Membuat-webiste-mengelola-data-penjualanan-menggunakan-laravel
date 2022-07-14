@extends('layouts.users')

@section('title', 'shopping')

@section('content')
    <div class="card-body">
        <div class="container-fluid">
            <div class="row">
                @foreach ($model as $item)
                    <div class="col-lg-3">
                        <div class="card mt-3" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset('storage/foto-produk/' . $item->gambar) }}">
                            <div class="card-body">
                                <h1 class="card-title">{{ $item->nama_produk }}</h1>
                                <h3>RP. {{ $item->harga }}</h3>
                                </p>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ url('pesan') }}/{{ $item->id }}" class="btn btn-success">Beli</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
@endsection
