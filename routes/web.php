<?php

use App\Http\Controllers\FaktorController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */
Route::get('/beranda', [PenggunaController::class, 'beranda'])->name('beranda');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/data-karyawan', [KaryawanController::class, 'index'])->name('data-karyawan');
    Route::get('/data-jabatan', [JabatanController::class, 'index'])->name('data-jabatan');
    Route::get('/tambah-data-jabatan', [JabatanController::class, 'create'])->name('tambah-data-jabatan');
    Route::get('/edit-data-jabatan/{id}', [JabatanController::class, 'edit'])->name('edit-data-jabatan');
    Route::get('/hapus-data-jabatan/{id}', [JabatanController::class, 'delete'])->name('hapus-data-jabatan');
    Route::post('/store-data-jabatan', [JabatanController::class, 'store'])->name('store-data-jabatan');
    Route::post('/update-data-jabatan', [JabatanController::class, 'update'])->name('update-data-jabatan');

// Route Pengguna
    Route::get('/data-pengguna', [PenggunaController::class, 'index'])->name('data-pengguna');
    Route::get('/tambah-data-pengguna', [PenggunaController::class, 'add'])->name('tambah-data-pengguna');
    Route::get('/edit-data-pengguna/{id}', [PenggunaController::class, 'edit'])->name('edit-data-pengguna');
    Route::get('/hapus-data-pengguna/{id}', [PenggunaController::class, 'delete'])->name('hapus-data-pengguna');
    Route::post('/update-data-pengguna', [PenggunaController::class, 'update'])->name('update-data-pengguna');
    Route::post('/store-data-pengguna', [PenggunaController::class, 'store'])->name('store-data-pengguna');

// Route Golongan
    Route::get('/data-golongan', [GolonganController::class, 'index'])->name('data-golongan');
    Route::get('/tambah-data-golongan', [GolonganController::class, 'create'])->name('tambah-data-golongan');
    Route::get('/edit-data-golongan/{id}', [GolonganController::class, 'edit'])->name('edit-data-golongan');
    Route::get('/hapus-data-golongan/{id}', [GolonganController::class, 'destroy'])->name('hapus-data-golongan');
    Route::post('/store-data-golongan', [GolonganController::class, 'store'])->name('store-data-golongan');
    Route::post('/update-data-golongan', [GolonganController::class, 'update'])->name('update-data-golongan');

// Route Karyawan
    Route::get('/data-karyawan', [KaryawanController::class, 'index'])->name('data-karyawan');
    Route::get('/tambah-data-karyawan', [KaryawanController::class, 'create'])->name('tambah-data-karyawan');
    Route::get('/edit-data-karyawan/{id}', [KaryawanController::class, 'edit'])->name('edit-data-karyawan');
    Route::get('/hapus-data-karyawan/{id}', [KaryawanController::class, 'destroy'])->name('hapus-data-karyawan');
    Route::post('/store-data-karyawan', [KaryawanController::class, 'store'])->name('store-data-karyawan');
    Route::post('/update-data-karyawan', [KaryawanController::class, 'update'])->name('update-data-karyawan');

// Route Kriteria
    Route::get('/data-kriteria', [KriteriaController::class, 'index'])->name('data-kriteria');
    Route::get('/tambah-data-kriteria', [KriteriaController::class, 'create'])->name('tambah-data-kriteria');
    Route::get('/edit-data-kriteria/{id}', [KriteriaController::class, 'edit'])->name('edit-data-kriteria');
    Route::get('/hapus-data-kriteria/{id}', [KriteriaController::class, 'destroy'])->name('hapus-data-kriteria');
    Route::post('/store-data-kriteria', [KriteriaController::class, 'store'])->name('store-data-kriteria');
    Route::post('/update-data-kriteria', [KriteriaController::class, 'update'])->name('update-data-kriteria');

// Route Sub Kriteria
    Route::get('/data-sub-kriteria', [SubKriteriaController::class, 'index'])->name('data-sub-kriteria');
    Route::get('/tambah-data-sub-kriteria', [SubKriteriaController::class, 'create'])->name('tambah-data-sub-kriteria');
    Route::get('/edit-data-sub-kriteria/{id}', [SubKriteriaController::class, 'edit'])->name('edit-data-sub-kriteria');
    Route::get('/hapus-data-sub-kriteria/{id}', [SubKriteriaController::class, 'destroy'])->name('hapus-data-sub-kriteria');
    Route::post('/store-data-sub-kriteria', [SubKriteriaController::class, 'store'])->name('store-data-sub-kriteria');
    Route::post('/update-data-sub-kriteria', [SubKriteriaController::class, 'update'])->name('update-data-sub-kriteria');

// Route Faktor
    Route::get('/data-faktor', [FaktorController::class, 'index'])->name('data-faktor');
    Route::get('/tambah-data-faktor', [FaktorController::class, 'create'])->name('tambah-data-faktor');
    Route::get('/edit-data-faktor/{id}', [FaktorController::class, 'edit'])->name('edit-data-faktor');
    Route::get('/hapus-data-faktor/{id}', [FaktorController::class, 'destroy'])->name('hapus-data-faktor');
    Route::post('/store-data-faktor', [FaktorController::class, 'store'])->name('store-data-faktor');
    Route::post('/update-data-faktor', [FaktorController::class, 'update'])->name('update-data-faktor');

// Route Penilaian
    Route::get('/data-nilai', [NilaiController::class, 'index'])->name('data-nilai');
    Route::get('/tambah-data-nilai', [NilaiController::class, 'create'])->name('tambah-data-nilai');
    Route::get('/edit-data-nilai/{id}', [NilaiController::class, 'edit'])->name('edit-data-nilai');
    Route::get('/hapus-data-nilai/{id}', [NilaiController::class, 'destroy'])->name('hapus-data-nilai');
    Route::post('/store-data-nilai', [NilaiController::class, 'store'])->name('store-data-nilai');
    Route::post('/update-data-nilai', [NilaiController::class, 'update'])->name('update-data-nilai');

// Route Laporan
    Route::get('/data-laporan', [LaporanController::class, 'index'])->name('data-laporan');
    Route::get('/tambah-data-laporan', [LaporanController::class, 'create'])->name('tambah-data-laporan');
    Route::get('/edit-data-laporan/{id}', [LaporanController::class, 'edit'])->name('edit-data-laporan');
    Route::get('/view-data-laporan/{id}', [LaporanController::class, 'view'])->name('view-data-laporan');
    Route::get('/hapus-data-laporan/{id}', [LaporanController::class, 'destroy'])->name('hapus-data-laporan');
    Route::post('/store-data-laporan', [LaporanController::class, 'store'])->name('store-data-laporan');
    Route::post('/update-data-laporan', [LaporanController::class, 'update'])->name('update-data-faktor-laporan');

});


