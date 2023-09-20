<!doctype html>
<html lang="en">

@extends('includes.head')
@section('title', 'Data Kriteria')

<body>

    <div class="screen-cover d-none d-xl-none"></div>

    <div class="row">
        <div class="col-12 col-lg-3 col-navbar d-none d-xl-block">
            @include('layouts.sidebar')
        </div>


        <div class="col-12 col-xl-9">
            @include('layouts.navbar')

            <div class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="form-inline" style="display:inline-block">
                            <a href="{{ URL::previous() }}" class="btn btn-secondary">Kembali</a>
                            <h2 class="content-title">Data Kriteria</h2>
                        </div>
                    </div>

                    <form action="{{ route('update-data-kriteria') }}" method="post">
                        @csrf
                        <div class="statistics-card">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Aspek</label>
                                <input type="text" name="aspek" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Masukan Aspek" value="{{ $data->aspek }}">
                                <input type="hidden" name="id" value="{{ $data->id }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Kriteria</label>
                                <input type="text" name="nama_kriteria" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Masukan nama kriteria" value="{{ $data->nama_kriteria }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nilai Standar</label>
                                <input type="number" name="nilai_standar" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Masukan Nilai Standar" value="{{ $data->nilai_standar }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Faktor</label>
                                <select name="faktor" id="" class="form-control">
                                    <option value="{{ $data->faktor }}" selected>{{ ($data->faktor == 'CF') ? "Core Factor (CF)" : "Secondary Factor (SF)" }}</option>
                                    <option value="CF">Core Factor (CF)</option>
                                    <option value="SF">Secondary Factor (SF)</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Persentase</label>
                                <input type="number" name="persentase" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Masukan Nilai Persentase" value="{{ $data->persentase }}">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary btn-sm">Update</button>
                                <a href="{{ URL::previous() }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        @include('includes.footer')

        <script>
            const navbar = document.querySelector('.col-navbar')
            const cover = document.querySelector('.screen-cover')

            const sidebar_items = document.querySelectorAll('.sidebar-item')

            function toggleNavbar() {
                navbar.classList.toggle('d-none')
                cover.classList.toggle('d-none')
            }

            function toggleActive(e) {
                sidebar_items.forEach(function(v, k) {
                    v.classList.remove('active')
                })
                e.closest('.sidebar-item').classList.add('active')

            }
        </script>
</body>

</html>
