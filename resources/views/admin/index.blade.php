@extends('layouts.master')

@section('title', 'admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center card-title">
                        <i class="mdi mdi-account-switch-outline"></i>Admin<i class="mdi mdi-account-switch-outline"></i>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div class="col-sm-auto">
                                    <a href="{{ url('admin/create') }}" class="btn btn-success"><i
                                            class="ri-add-line align-bottom me-1"></i>Tambah</a>
                                </div>
                            </div>
                            <div class="col-sm">
                                <form action="" method="GET">
                                    <div class="d-flex justify-content-sm-end">
                                        <div class="search-box ms-2">
                                            <input type="search" class="form-control search" name="search"
                                                placeholder="Search...">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary ms-1 btn-rounded">Search</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show"
                        role="alert">
                        <i class="ri-check-double-line label-icon"></i><strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss=" alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="table-responsive table-card mt-3 mb-1">
                    <table class="table align-middle table-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">No</th>
                                <th>Nama Admin</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Nomor Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($model as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if ($item->is_admin == '1')
                                            <label>Admin</label>
                                        @elseif($item->is_admin == '0')
                                            <label class="btn-danger">Banned</label>
                                        @endif
                                    </td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>
                                        @if ($item->status == '0')
                                            <label class="btn-success">Active</label>
                                        @elseif($item->status == '1')
                                            <label class="btn-danger">Inactive</label>
                                        @endif
                                    </td>
                                    <td>{{ $item->no_hp }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <a href="{{ 'admin/' . $item->id . '/edit' }}"
                                                    class="btn btn-warning"><span><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="10" height="10" fill="currentColor"
                                                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg></span> Edit</a>
                                            </div>
                                            <div class="remove">
                                                <form action="{{ url('admin/' . $item->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger"><span><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="10"
                                                                height="10" fill="currentColor"
                                                                class="bi bi-x-square-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z" />
                                                            </svg></span> Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                       <div class="d-flex justifiy-content-end">
                            {{ $model->links() }}
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
