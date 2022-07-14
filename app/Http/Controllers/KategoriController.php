<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $kategori = Kategori::where('jenis_produk', 'like', '%'.$search.'%')->paginate(8);
        return view('kategori.index', compact(
            'search', 'kategori'
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
        return view('kategori.create')->with('kategori', $kategori);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //-------------validasiiii----------------------
        $validateData = $request->validate([
            'jenis_produk' => 'required',
            'gambar' => 'required',
        ]);

        if($request->file('gambar')) {
            $validateData['gambar'] = $request->file('gambar')->store('kategori-image');
        }

        kategori::create($validateData);
        return redirect('kategori')->with('success', 'data berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kategori = Kategori::find($id);
        return view('kategori.edit')->with('kategori', $kategori);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori  $kategori)
    {
        //
        $rules = [
            'jenis_produk' => 'required',
            'gambar' => 'required',
        ];

        $validateData = $request->validate($rules);

        if ( $request->file('gambar')) {
            if ($request->gambar_lama) {
                Storage::delete($request->gambar_lama);
            }
            $validateData['gambar'] = $request->file('gambar')->store('kategori-image');
        }

        Kategori::where('id', $kategori->id)->update($validateData);

        return redirect('kategori')->with('success', "data berhasil di update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        //
        if ($kategori->gambar) {
            Storage::delete($kategori->gambar);

        }
        kategori::destroy($kategori->id);

        return redirect('kategori')->with('success', 'Data Berhasil DiHapus');
    }
    
    //-------------------
    public function profil()
    {
        $data = Kategori::all();
        return view('pages.profil');
    }

    public function help()
    {
        $data = Kategori::all();
        return view('pages.help');
    }

    public function setting()
    {
        $data = Kategori::all();
        return view('pages.setting');
    }

    public function brand()
    {
        $data = Kategori::all();
        return view('pages.produk');
    }
}
