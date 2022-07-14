<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HalamanUserController extends Controller
{
    //
    public function pengguna()
    {
        return view('users.tampilandepan');
    }

    public function profile()
    {
        // $model = User::where('id', Auth::user()->id)->first();
        // return view('users.profil', compact(
        //     'model'
        // ));
    }

     public function edit($id)
    {
        //
        $model = User::find($id);
        return view('pages.edit', compact(
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

}
