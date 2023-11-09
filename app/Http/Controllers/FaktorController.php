<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class FaktorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kary = Karyawan::all();
        $subKriteria = SubKriteria::all();
        $kriteria = Kriteria::all();
        $n = Penilaian::all();

        return view('data-faktor', ['kary' => $kary, 'subKriteria' => $subKriteria, 'kriteria' => $kriteria, 'n' => $n]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sub_kriteria_id = $request->sub_kriteria_id;
        $karyawan_id = $request->karyawan_id;
        $nilai = $request->nilai;
        $kriteria = $request->kriteria;
        $ids = $request->ids;

        $c_karyawan = count($karyawan_id);
        $c_sub = count($sub_kriteria_id);
        $iks = $c_karyawan * $c_sub;

        $nilais = Penilaian::whereNull('nilai')->get();

        if ($request->action == 'sync') {
            for ($i = 0; $i < count($karyawan_id); $i++) {
                for ($e = 0; $e < count($sub_kriteria_id); $e++) {

                    $data = Penilaian::create([
                        'nilai' => null,
                        'sub_kriteria_id' => $sub_kriteria_id[$e],
                        'karyawan_id' => $karyawan_id[$i]
                    ]);
                }

            }
        } else {
            foreach ($nilais as $key => $value) {
                $data = Penilaian::where('id', $value->id)->update([
                    'nilai' => $nilai[$key],
                ]);
            }
        }

        toastr()->success("Data Berhasil Disimpan");

        return redirect()->route('data-faktor');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
