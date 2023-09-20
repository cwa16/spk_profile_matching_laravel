<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Jabatan;
use App\Models\Golongan;

class KaryawanController extends Controller
{
    public function index()
    {
        $data = Karyawan::all();
        return view('data-karyawan', ['data' => $data]);
    }

    public function create()
    {
        $jabatan = Jabatan::all();
        $golongan = Golongan::all();
        return view('tambah-data-karyawan', ['jabatan' => $jabatan, 'golongan' => $golongan,]);
    }

    public function store(Request $request)
    {
        $data = Karyawan::create([
            'jabatan_id' => $request->jabatan,
            'golongan_id' => $request->golongan,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);

        toastr()->success("Data Berhasil Disimpan");

        return redirect()->route('data-karyawan');
    }

    public function destroy($id)
    {
        $data = Karyawan::where('id', $id)->delete();

        toastr()->success("Data Berhasil Dihapus");

        return redirect()->route('data-karyawan');
    }

    public function edit($id)
    {
        $data = Karyawan::findOrFail($id);
        $jabatan = Jabatan::all();
        $golongan = Golongan::all();

        return view('edit-data-karyawan', ['data' => $data, 'jabatan' => $jabatan, 'golongan' => $golongan]);
    }

    public function update(Request $request)
    {
        $data = Karyawan::where('id', $request->id)->update([
            'jabatan_id' => $request->jabatan,
            'golongan_id' => $request->golongan,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);

        toastr()->success("Data Berhasil Diupdate");

        return redirect()->route('data-karyawan');
    }

}
