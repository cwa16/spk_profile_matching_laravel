<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('data-pengguna', ['users' => $users]);
    }


    public function beranda()
    {
        return view('beranda');
    }

    public function add()
    {
        return view('tambah-data-pengguna');
    }

    public function store(Request $request)
    {
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'peran' => $request->peran,
            'password' => Hash::make($request->password)

        ]);

        $users = User::all();

        // Display notification toast
        toastr()->success('Data Berhasil disimpan');

        return redirect()->route('data-pengguna');
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);

        return view('edit-data-pengguna', ['data' => $data]);
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();

        // Display notification toast
        toastr()->success('Data Berhasil dihapus');

        return Redirect::back();
    }

    public function update(Request $request)
    {
        $user = User::where('id', $request->id)->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'peran' => $request->peran,
                'password' => Hash::make($request->password)
            ]
        );


        $users = User::all();

        // Display notification toast
        toastr()->success('Data Berhasil diupdate');

        return view('data-pengguna', [ 'users' => $users]);
    }
}
