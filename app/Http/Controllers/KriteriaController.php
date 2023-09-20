<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kriteria::all();
        return view('data-kriteria', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambah-data-kriteria');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Kriteria::create([
            'aspek' => $request->aspek,
            'nama_kriteria' => $request->nama_kriteria,
            'nilai_standar' => $request->nilai_standar,
            'faktor' => $request->faktor,
            'persentase' => $request->persentase
        ]);

        toastr()->success("Data Berhasil Disimpan");

        return redirect()->route('data-kriteria');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Kriteria::findOrFail($id);
        return view('edit-data-kriteria', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = Kriteria::find($request->id)->update([
            'aspek' => $request->aspek,
            'nama_kriteria' => $request->nama_kriteria,
            'nilai_standar' => $request->nilai_standar,
            'faktor' => $request->faktor,
            'persentase' => $request->persentase
        ]);

        toastr()->success("Data Berhasil Diupdate");

        return redirect()->route('data-kriteria');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kriteria::find($id)->delete();
        toastr()->success("Data Berhasil Dihapus");

        return redirect()->route('data-kriteria');

    }
}
