@extends('layouts.master')

@section('title', 'Admin')

@section('content')
    <div class="col-lg-12">
        <div class="card-header">
            <h3 class="text-center">Tambahkan Data</h3>
        </div>
        <div class="card-body bg-white">
            <div class="row">
                <form action="{{ url('profiluser/' . $model->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="name" placeholder="Masukkan Nama"
                                    value="{{ $model->name }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label for="firstnamefloatingInput">Nama</label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" placeholder="Enter your email"
                                    value="{{ $model->email }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label for="emailfloatingInput">Email</label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="password" placeholder="Masukkan password"
                                    value="{{ $model->password }}">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label for="passwordfloatingInput">Password</label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-floating">
                                <input type="number" class="form-control" name="no_hp"
                                    placeholder="Masukkan Nomor Telepon" value="{{ $model->no_hp }}">
                                @error('no_hp')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label for="passwordfloatingInput1">Nomor Telepon</label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat"
                                    value="{{ $model->alamat }}">
                                @error('alamat')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label for="passwordfloatingInput1">Alamat</label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
