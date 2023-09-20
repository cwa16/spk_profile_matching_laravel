<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NTotal;
use App\Models\Penilaian;

class LaporanController extends Controller
{
    public function index()
    {
        $data = NTotal::groupBy('subjek')->get();

        return view('laporan', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $nilai = $request->final;
        $nama = $request->namas;
        $tanggal = $request->tanggal;
        $subjek = $request->subjek;

        foreach ($nama as $key => $value) {
            $data = NTotal::create([
                'subjek' => $subjek,
                'nama' => $nama[$key],
                'tanggal' => $tanggal[$key],
                'nilai' => $nilai[$key]
            ]);
        }

        toastr()->success("Data Berhasil Disimpan");

        Penilaian::truncate();


        return redirect()->route('data-nilai');
    }

    public function view($id)
    {
        $data = NTotal::findOrFail($id);

        $datas = NTotal::where('subjek', $data->subjek)->orderBy('nilai', 'DESC')->get();

        return view('cetak-laporan', ['data' => $data, 'datas' => $datas]);
    }

    public function destroy($id)
    {
        $data = NTotal::findOrFail($id);

        NTotal::where('subjek', $data->subjek)->delete();

        toastr()->success("Data Berhasil Dihapus");

        return redirect()->route('data-laporan');

    }
}
