<!doctype html>
<html lang="en">

@extends('includes.head')
@section('title', 'Data Sub Kriteria')

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

                    <form action="{{ route('store-data-sub-kriteria') }}" method="post">
                        @csrf
                        <div class="statistics-card">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Kriteria</label>
                                <select name="kriteria" id="" class="form-control">
                                    <option value="" selected disabled>-- pilih kriteria --</option>
                                    @foreach ($data as $item)
                                        <option value="{{ $item->id }}">{{ $item->aspek }} ({{ $item->nama_kriteria }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Sub Kriteria</label>
                                <input type="text" name="nama_sub_kriteria" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Masukan nama sub kriteria">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nilai</label>
                                <input type="number" name="nilai" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Masukan Nilai">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary btn-sm">Simpan</button>
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
