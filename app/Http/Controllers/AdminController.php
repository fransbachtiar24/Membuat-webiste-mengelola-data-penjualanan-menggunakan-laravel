<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $model = User::where('is_admin', '1')->paginate(10);
        return view('admin.index', compact(
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
        return view('admin.create');
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
            'name' => 'required',
            'email' => 'required|email',
            'is_admin' => 'required',
            'alamat' => 'required|max:50',
            'no_hp' => 'required',
            'status' => 'required',
            'password' => 'required|min:5|max:225',
        ]);

        $user = new User();
        $user->name = $validateData['name'];
        $user->email = $validateData['email'];
        $user->is_admin = $validateData['is_admin'];
        $user->status = $validateData['status'];
        $user->alamat = $validateData['alamat'];
        $user->no_hp = $validateData['no_hp'];
        $user['password'] = Hash::make($validateData['password']);
        $user->save();
        return redirect('admin')->with('success', 'Data Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $model = User::find($id);
        return view('admin.edit', compact(
            'model'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'is_admin' => 'required',
            'alamat' => 'required|max:50',
            'no_hp' => 'required',
            'status' => 'required',
            'password' => 'required|min:5|max:225',
        ]);

        $user = User::find($id);
        $user->name = $validateData['name'];
        $user->email = $validateData['email'];
        $user->is_admin = $validateData['is_admin'];
        $user->status = $validateData['status'];
        $user->alamat = $validateData['alamat'];
        $user->no_hp = $validateData['no_hp'];
        $user['password'] = Hash::make($validateData['password']);
        $user->save();
        return redirect('admin')->with('success', 'Data Berhasil Di Update');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $model = User::find($id);
        $model->delete();
        return redirect('admin')->with('success', 'Data Berhasil Dihapus');
    }
}
