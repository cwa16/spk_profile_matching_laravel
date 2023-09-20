<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;
use Redirect;

class JabatanController extends Controller
{
    public function index()
    {
        $data = Jabatan::all();

        return view('data-jabatan', ['data' => $data]);
    }

    public function create()
    {
        return view('tambah-data-jabatan');
    }

    public function store(Request $request)
    {
        $data = Jabatan::create(
            [
                'nama_jabatan' => $request->nama_jabatan
            ]
            );

            toastr()->success("Data Berhasil Disimpan");

            return redirect()->route('data-jabatan');
    }

    public function edit($id)
    {
        $data = Jabatan::findOrFail($id);

        return view('edit-data-jabatan', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $data = Jabatan::where('id', $request->id)->update(
            [
                'nama_jabatan' => $request->nama_jabatan
            ]
            );

            toastr()->success("Data Berhasil Diupdate");

            return redirect()->route('data-jabatan');
    }

    public function delete($id)
    {
        Jabatan::where('id', $id)->delete();

        return Redirect::back();
    }
}
