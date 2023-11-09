<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Penilaian;
use App\Models\Bobot;
use App\Models\NilaiFaktor;
use DB;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        $aspek = Kriteria::all();
        $nilai = Penilaian::all();

        $faktor = DB::table('penilaian')
                    ->join('sub_kriteria', 'penilaian.sub_kriteria_id', '=', 'sub_kriteria.id')
                    ->join('karyawan', 'penilaian.karyawan_id', '=', 'karyawan.id')
                    ->whereIn('sub_kriteria.id', [2,3])
                    ->select('karyawan.nama','sub_kriteria.nama_sub_kriteria','penilaian.nilai')
                    ->groupBy('karyawan.nama','sub_kriteria.nama_sub_kriteria')
                    ->get();

        $k1 = SubKriteria::orderBy('id', 'asc')->pluck('nilai');
        $ks = SubKriteria::orderBy('id', 'asc')->pluck('persentase');
        $kss = SubKriteria::groupBy('faktor')->orderBy('id', 'asc')->pluck('persentase');
        $nsf = SubKriteria::orderBy('id', 'asc')->where('faktor', 'SF')->groupBy('faktor')->value('persentase');
        $ncf = SubKriteria::orderBy('id', 'asc')->where('faktor', 'CF')->groupBy('faktor')->value('persentase');

        $k = SubKriteria::orderBy('id', 'asc')->get();

        $per_tp = Kriteria::where('id', 1)->value('persentase');
        $per_pk = Kriteria::where('id', 2)->value('persentase');
        $per_sk = Kriteria::where('id', 3)->value('persentase');
        $per_k = Kriteria::where('id', 4)->value('persentase');

        $cek_tanggal = Penilaian::first();
        if ($cek_tanggal == null) {
            $tanggal = 0;
        } else {
            $tanggal = Penilaian::first()->value('created_at');
        }

        $k2 = SubKriteria::where('kriteria_id', 2)->get();

        return view('data-penilaian', ['karyawan' => $karyawan,
                                       'aspek' => $aspek,
                                       'nilai' => $nilai,
                                       'k1' => $k1,
                                       'k2' => $k2,
                                       'k' => $k,
                                       'ks' => $ks,
                                       'kss' => $kss,
                                       'nsf' => $nsf,
                                       'ncf' => $ncf,
                                       'faktor' => $faktor,
                                       'per_tp' => $per_tp,
                                       'per_pk' => $per_pk,
                                       'per_sk' => $per_sk,
                                       'per_k' => $per_k,
                                       'tanggal' => $tanggal,
                                    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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
