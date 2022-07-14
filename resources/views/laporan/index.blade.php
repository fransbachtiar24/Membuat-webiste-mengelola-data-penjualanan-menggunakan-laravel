@extends('layouts.master')

@section('title', 'Laporan Penjualan')

@section('content')
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Laporan Order</h4>
    </div>
    </div>
    </div>
    <!-- end page title -->
    <div class="card">
        <div class="card-header">
            <div class="d-flex">
                <h5 class="card-title flex-grow-1 mb-0"><i
                        class="mdi mdi-truck-fast-outline align-middle me-1 text-muted"></i> Logistics</h5>
            </div>
        </div>
        <div class="card-body">
            <div class="text-center">
                <lord-icon src="https://cdn.lordicon.com/uetqnvvg.json" trigger="loop"
                    colors="primary:#405189,secondary:#0ab39c" style="width:80px;height:80px"></lord-icon>
                <h5 class="fs-16 mt-2">RQK Logistics</h5>
                <p class="text-muted mb-0">Happy Shopping Day <i class=" bx bx-wink-smile"></i></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="orderList">
                <div class="card-header  border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">Laporan</h5>
                        <div class="flex-shrink-0">
                            <a href="{{ url('laporan/create') }}" class="btn btn-success add-btn"><i
                                    class="ri-add-line align-bottom me-1"></i> Create
                                Order</a>
                            <a href="{{ url('cetaklaporan') }}" target="_blank" class="btn btn-info"><i
                                    class="ri-file-download-line align-bottom me-1"></i>Cetak</a>
                        </div>
                    </div>
                </div>
                <div class="card-body border border-dashed border-end-0 border-start-0">
                    <form>
                        <div class="row g-3">
                            <div class="col-xxl-5 col-sm-6 mb-6 mb-3">
                                <div class="search-box">
                                    <form action="{{ url('pencarian') }}" method="get">
                                        <input type="text" class="form-control search" name="search"
                                            placeholder="Search for order ID, customer, order status or something...">
                                        <i class="ri-search-line search-icon"></i>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </form>
                </div>
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show"
                        role="alert">
                        <i class="ri-check-double-line label-icon"></i><strong>{{ session('success') }}</strong>
                    </div>
                @endif
                <div class="card-body pt-0 py-2">
                    <div class="table-responsive table-card mb-1">
                        <table class="table align-middle table-nowrap py-2" id="customerTable">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Nama produk</th>
                                    <th>Jenis Produk</th>
                                    <th>Merek</th>
                                    <th>Ukuran</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Jumlah Pesan</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($laporan as $index => $item)
                                    <tr>
                                        <th>{{ $index + $laporan->firstItem() }}</th>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ $item->nama_pelanggan }}</td>
                                        <td>{{ $item->produk->nama_produk }}</td>
                                        <td>{{ $item->jenis_produk }}</td>
                                        <td>{{ $item->brand }}</td>
                                        <td>{{ $item->ukuran }}</td>
                                        <td>{{ $item->gender }}</td>
                                        <td>{{ $item->jumlah_pesan }}</td>
                                        <td>Rp. {{ number_format($item->harga) }}</td>
                                        <td>Rp. {{ number_format($item->total_harga) }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="edit">
                                                    <a href="{{ 'laporan/' . $item->id . '/edit' }}"
                                                        class="btn btn-warning"><span><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="10"
                                                                height="10" fill="currentColor"
                                                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                            </svg></span> Edit</a>
                                                </div>
                                                <div class="remove">
                                                    <form action="{{ url('laporan/' . $item->id) }}" method="POST">
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
                                @foreach ($pendapatan as $item)
                                    <tr>
                                        <td colspan="11" align="right"><strong>Pendapatan : </strong></td>
                                        <td><strong>Rp. {{ number_format($item->pendapatan) }}</strong></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="pagination-wrap hstack gap-2">
                            {{ $laporan->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--end col-->
    </div>
@endsection
