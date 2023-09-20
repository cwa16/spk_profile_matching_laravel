<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubKriteria;
use App\Models\Kriteria;

class SubKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SubKriteria::all();
        return view('data-sub-kriteria', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Kriteria::all();
        return view('tambah-data-sub-kriteria', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = SubKriteria::create([
            'kriteria_id' => $request->kriteria,
            'nama_sub_kriteria' => $request->nama_sub_kriteria,
            'nilai' => $request->nilai
        ]);

        toastr()->success("Data Berhasil Disimpan");

        return redirect()->route('data-sub-kriteria');
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
        $dataSub = SubKriteria::findOrFail($id);
        $data = Kriteria::all();

        return view('edit-data-sub-kriteria', ['data' => $data, 'dataSub' => $dataSub]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = SubKriteria::find($request->id)->update([
            'kriteria_id' => $request->kriteria,
            'nama_sub_kriteria' => $request->nama_sub_kriteria,
            'faktor' => $request->faktor,
            'nilai' => $request->nilai,
            'persentase' => $request->persentase,
        ]);

        toastr()->success("Data Berhasil Diupdate");

        return redirect()->route('data-sub-kriteria');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SubKriteria::find($id)->delete();

        toastr()->success("Data Berhasil Dihapus");

        return redirect()->route('data-sub-kriteria');
    }
}
