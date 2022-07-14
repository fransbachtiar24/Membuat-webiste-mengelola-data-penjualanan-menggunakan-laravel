@extends('layouts.users')

@section('title', 'profil')

@section('content')
    <div class="card-header">
        <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle"
                viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path fill-rule="evenodd"
                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
            </svg>
        </div>
    </div>
    <div class="card-body bg-white">
        <div class="container-fluid">
            <div class="row mb-3">
                <form action="javascript:void(0);">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="firstNameinput" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ auth()->user()->name }}">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="lastNameinput" class="form-label">Nomor Telepon</label>
                                <input type="number" class="form-control" name="no_hp"
                                    value="{{ auth()->user()->no_hp }}">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="compnayNameinput" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat"
                                    value="{{ auth()->user()->alamat }}">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="phonenumberInput" class="form-label">password</label>
                                <input type="password" class="form-control" name="password"
                                    value="{{ auth()->user()->password }}">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="emailidInput" class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ auth()->user()->email }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="text-end">
                                <a href="{{ url('profiluser/' . $model->id . '/edit') }}"
                                    class="btn btn-warning"><span><svg xmlns="http://www.w3.org/2000/svg" width="10"
                                            height="10" fill="currentColor" class="bi bi-pencil-square"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg></span> Update</a>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </form>
            </div>
        </div>
    </div>
@endsection
