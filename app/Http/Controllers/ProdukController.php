<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use PDF;
use Illuminate\Http\Request;

class ProdukController extends Controller
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
        $produks = Produk::where('nama_produk', 'like', '%'.$search.'%')
        ->orWhere('brand', 'like', '%'.$search.'%')->orWhere('gender', 'like', '%'.$search.'%')
        ->orWhere('ukuran', 'like', '%'.$search.'%')->paginate(10);
        return view('produk.index', compact(
            'produks', 'search'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        return view('produk.create')->with('kategori', $kategori);
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
          // 1.Validasi
          $validateData = $request->validate([
            "nama_produk"   => "required",
            "brand"         => "required",
            "gambar"         => "required|file|image",
            "kategori_id"   => "required",
            "ukuran"        => "required",
            "gender"        => "required",
            "harga"         => "required",
            "stok"          => "required",
        ]);
        $ext = $request->gambar->getClientOriginalExtension();
        $nama_file = "gambar-".time(). "." . $ext;
        $path = $request->gambar->storeAs('foto-produk', $nama_file);
        // 2. Simpan
        $produk = new Produk();
        $produk->nama_produk   = $validateData["nama_produk"];
        $produk->brand         = $validateData["brand"];
        $produk->gambar         = $nama_file;
        $produk->kategori_id   = $validateData["kategori_id"];
        $produk->ukuran        = $validateData["ukuran"];
        $produk->gender        = $validateData["gender"];
        $produk->harga         = $validateData["harga"];
        $produk->stok          = $validateData["stok"];
        $produk->save(); //simpan ke table produks
        return redirect('produk')->with('success', 'Data Berhasil Ditambah'); //redirect ke produk.index
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
        $kategori = Kategori::all();
        return view('produk.edit')->with("produk", $produk)->with("kategori", $kategori);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        //
         // 1.Validasi update
         $validateData = $request->validate([
            "nama_produk"   => "required",
            "brand"         => "required",
            "kategori_id"   => "required",
            "ukuran"        => "required",
            "gender"        => "required",
            "stok"         => "required",
            "harga"         => "required",
        ]);

        // 2. Simpan update
        Produk::where('id', $produk->id)->update($validateData);
        return redirect('produk')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        // 
        Produk::destroy($produk->id);
        return redirect('/produk');
    }

    //exportpdf---cetak
    public function exportpdf()
    {
        $data = Produk::all();
        view()->share('data', $data);
        $pdf= PDF::loadview('produk.pdf');
        return $pdf->download('data-produk '.date('d-m-Y').'-'.time().'.pdf');
    }

    public function cetak()
    {
        $data = Produk::all();
        return view('produk.cetak-produk-pdf', compact('data'));
    }
    //-----------------------------+++++++++---------------------------------------------------
}
