<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pelanggan = User::where('is_admin', '0')->paginate(10);
        return view('pelanggan.index', compact(
            'pelanggan'
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
        $model = new Pelanggan;
        return view('pelanggan.create', compact(
            'model'
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
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $model = new Pelanggan;
        $model->name=$validate['name'];
        $model->email=$validate['email'];
        $model->save();

        return redirect('/pelanggan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $model = User::find($id);
        return view('pelanggan.edit', compact(
            'model'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'alamat' => 'required|max:50',
            'no_hp' => 'required',
            'status' => 'required',
            'password' => 'required|min:5|max:225',
        ]);

        $user = User::find($id);
        $user->name = $validateData['name'];
        $user->email = $validateData['email'];
        $user->status = $validateData['status'];
        $user->alamat = $validateData['alamat'];
        $user->no_hp = $validateData['no_hp'];
        $user['password'] = Hash::make($validateData['password']);
        $user->save();
        return redirect('pelanggan')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
