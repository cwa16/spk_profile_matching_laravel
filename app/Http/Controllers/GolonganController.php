<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Golongan;
use Redirect;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Golongan::all();
        return view('data-golongan', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambah-data-golongan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Golongan::create(
            [
                'golongan' => $request->golongan
            ]
            );

            toastr()->success("Data Berhasil Disimpan");

            return redirect()->route('data-golongan');
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
        $data = Golongan::findOrFail($id);

        return view('edit-data-golongan', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = Golongan::where('id', $request->id)->update(
            [
                'golongan' => $request->golongan
            ]
            );

            toastr()->success("Data Berhasil Diupdate");

            return redirect()->route('data-golongan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Golongan::where('id', $id)->delete();

        return Redirect::back();
    }
}
