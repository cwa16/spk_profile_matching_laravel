<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function index()
    {
        $data = Karyawan::all();
        return view('data-karyawan', ['data' => $data]);
    }

    public function tambah()
    {
        return view('tambah-data-karyawan');
    }
}
