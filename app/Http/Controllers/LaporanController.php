<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $search = $request->search;
        $pendapatan = DB::select('select sum(total_harga) AS pendapatan from laporans');
        $laporan = Laporan::where('nama_pelanggan', 'like', '%'.$search.'%')->paginate(5);
        return view('laporan.index', compact(
            'laporan', 'pendapatan'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Laporan $laporan)
    {
        //
        $produk = Produk::all();
        return view('laporan.create', compact(
            'produk'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            "tanggal" => 'required',
            "nama_pelanggan" => 'required',
            "jenis_produk" => 'required',
            "brand" => 'required',
            "ukuran" => 'required',
            "gender" => 'required',
            "jumlah_pesan" => 'required',
            "harga" => 'required',
            "produk_id" => 'required',
        ]);
        $laporan = new Laporan();
        $laporan->tanggal = $validateData['tanggal'];
        $laporan->nama_pelanggan = $validateData['nama_pelanggan'];
        $laporan->jenis_produk = $validateData['jenis_produk'];
        $laporan->brand = $validateData['brand'];
        $laporan->ukuran = $validateData['ukuran'];
        $laporan->gender = $validateData['gender'];
        $laporan->jumlah_pesan = $validateData['jumlah_pesan'];
        $laporan->harga = $validateData['harga'];
        $laporan->total_harga = $laporan->total_harga+$laporan->harga*$laporan->jumlah_pesan;
        $laporan->produk_id = $validateData['produk_id'];
        $laporan->save();
        return redirect('laporan')->with('success', 'Orderan Telah Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $produk = Produk::all();
        $modal = Laporan::find($id);
        return view('laporan.edit', compact(
            'modal', 'produk'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validateData = $request->validate([
            "tanggal" => 'required',
            "nama_pelanggan" => 'required',
            "jenis_produk" => 'required',
            "brand" => 'required',
            "ukuran" => 'required',
            "gender" => 'required',
            "jumlah_pesan" => 'required',
            "harga" => 'required',
            "produk_id" => 'required',
        ]);

        $laporan = Laporan::find($id);
        $laporan->tanggal = $validateData['tanggal'];
        $laporan->nama_pelanggan = $validateData['nama_pelanggan'];
        $laporan->jenis_produk = $validateData['jenis_produk'];
        $laporan->brand = $validateData['brand'];
        $laporan->ukuran = $validateData['ukuran'];
        $laporan->gender = $validateData['gender'];
        $laporan->jumlah_pesan = $validateData['jumlah_pesan'];
        $laporan->harga = $validateData['harga'];
        $laporan->total_harga = $laporan->total_harga+$laporan->harga*$laporan->jumlah_pesan;
        $laporan->produk_id = $validateData['produk_id'];
        $laporan->update();
        return redirect('laporan')->with('success', 'Orderan Telah Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $modal = Laporan::find($id);
        $modal->delete();
        return redirect('laporan')->with('success', 'Data Berhasil Di Hapus');
    }

     public function cetak()
    {
        $pendapatan = DB::select('select sum(total_harga) AS pendapatan from laporans');
        $data = Laporan::all();
        return view('laporan.cetak-laporan', compact(
            'data', 'pendapatan'
        ));
    }
}

