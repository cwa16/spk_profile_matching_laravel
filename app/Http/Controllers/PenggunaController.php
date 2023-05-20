<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PenggunaController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('data-pengguna', ['users' => $users]);
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
        ])
    }
}
