<?php

namespace App\Http\Controllers;

use App\Models\Profiluser;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfiluserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $model = User::where('id', Auth::user()->id)->first();
        return view('users.profil', compact(
         'model'
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
        return view('users.profil');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profiluser  $profiluser
     * @return \Illuminate\Http\Response
     */
    public function show(Profiluser $profiluser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profiluser  $profiluser
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Models\Profiluser  $profiluser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'alamat' => 'required|max:50',
            'no_hp' => 'required',
            'password' => 'required|min:5|max:225',
        ]);

        $user = User::find($id);
        $user->name = $validateData['name'];
        $user->email = $validateData['email'];
        $user->alamat = $validateData['alamat'];
        $user->no_hp = $validateData['no_hp'];
        $user['password'] = Hash::make($validateData['password']);
        $user->save();
        return redirect('profiluser')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profiluser  $profiluser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profiluser $profiluser)
    {
        //
    }
}
