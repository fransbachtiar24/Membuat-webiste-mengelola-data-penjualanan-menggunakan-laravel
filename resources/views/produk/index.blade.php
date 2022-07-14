@extends('layouts.master')

@section('title', 'Barang')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center card-title font-weight-bold">
                        DATA PRODUK
                    </h3>
                    <span> <a href="{{ route('exportpdf') }}" class="btn btn-info"><span><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-file-pdf-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M5.523 10.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.035 21.035 0 0 0 .5-1.05 11.96 11.96 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.888 3.888 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 4.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                                    <path fill-rule="evenodd"
                                        d="M4 0h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm.165 11.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.64 11.64 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.707 19.707 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                                </svg></span> Export To pdf</a>
                        <a href="{{ route('cetak') }}" class="btn btn-dark" target="_blank"><span><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-printer-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                                    <path
                                        d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                </svg></span> Print</a>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="{{ url('produk/create') }}">
                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                            id="create-btn" data-bs-target="#showModal"><i
                                                class="ri-add-line align-bottom me-1"></i> Add</button>
                                    </a>
                                    <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i
                                            class="ri-delete-bin-2-line"></i></button>
                                </div>
                            </div>
                            <div class="col-sm">
                                <form action="{{ url('produk') }}" method="GET">
                                    <div class="d-flex justify-content-sm-end">
                                        <div class="search-box ms-2">
                                            <input name="search" type="text" class="form-control search-input"
                                                placeholder="Search..." value="{{ $search }}">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary ms-1 btn-rounded">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show"
                                role="alert">
                                <i class="ri-check-double-line label-icon"></i><strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss=" alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="customerTable">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" style="width: 50px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="checkAll"
                                                    value="option">
                                            </div>
                                        </th>
                                        <th scope="col">No</th>
                                        <th>Nama Produk</th>
                                        <th>Brand</th>
                                        <th>Jenis Produk</th>
                                        <th>Gambar</th>
                                        <th>Ukuran</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($produks as $index => $item)
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="chk_child"
                                                        value="option1">
                                                </div>
                                            </th>
                                            <td>{{ $index + $produks->firstItem() }}</td>
                                            <td>{{ $item->nama_produk }}</td>
                                            <td>{{ $item->brand }}</td>
                                            <td>{{ $item->kategori->jenis_produk }}</td>
                                            <td>
                                                <img src="{{ asset('storage/foto-produk/' . $item->gambar) }}"
                                                    alt="Gagal Memuat Foto" width="50px">
                                            </td>
                                            <td>{{ $item->ukuran }}</td>
                                            <td>{{ $item->gender }}</td>
                                            <td>{{ number_format($item->stok) }}</td>
                                            <td>{{ number_format($item->harga) }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <div class="edit">
                                                        <a href="{{ 'produk/' . $item->id . '/edit' }}">
                                                            <button class="btn btn-sm btn-warning edit-item-btn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#showModal"><span><svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="10"
                                                                        height="10" fill="currentColor"
                                                                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                        <path fill-rule="evenodd"
                                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                    </svg></span> Edit</button></a>
                                                    </div>
                                                    <div class="remove">
                                                        <button class="btn btn-sm btn-danger remove-item-btn"
                                                            data-id="{{ $item->id }}" data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal">
                                                            Remove</button>
                                                        <!-- Default Modals -->
                                                        <div id="deleteModal" class="modal fade" tabindex="-1"
                                                            aria-labelledby="myModalLabel" aria-hidden="true"
                                                            style="display: none;">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form
                                                                        action="{{ route('produk.destroy', ['produk' => $item->id]) }}"
                                                                        method="POST">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="myModalLabel">
                                                                                Confirmation Delete Data</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close">
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Anda yakin ingin menghapus data ini ?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-light"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary"
                                                                                value="Delete">Delete</button>
                                                                        </div>
                                                                    </form>
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        {{ $produks->links() }}
                    </div>
                </div>
            </div>
        </div><!-- end card -->
    </div>
    <!-- end col -->
    </div>
    <!-- end col -->
    </div>

@endsection
