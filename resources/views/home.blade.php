<!doctype html>
<html lang="en">

@extends('includes.head')
@section('title', 'Halaman Utama')

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
                        <h2 class="content-title">Beranda</h2>
                    </div>

                    @if (Auth::user()->peran == 'admin')
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="statistics-card">

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column justify-content-between align-items-start">
                                    <h5 class="content-desc">Users</h5>

                                    <h3 class="statistics-value">
                                        {{ $users->count() }}
                                    </h3>
                                </div>

                                <button class="btn-statistics">
                                   <a href="{{ route('data-pengguna') }}"> <img src="./assets/img/global/times.svg" alt=""></a>
                                </button>
                            </div>

                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="statistics-card">

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column justify-content-between align-items-start">
                                    <h5 class="content-desc">Karyawan</h5>

                                    <h3 class="statistics-value">
                                        {{ $kary->count() }}
                                    </h3>
                                </div>

                                <button class="btn-statistics">
                                   <a href="{{ route('data-karyawan') }}"> <img src="./assets/img/global/times.svg" alt=""></a>
                                </button>
                            </div>

                        </div>
                    </div>
                    @endif

                    @if (Auth::user()->peran == 'hrd' || Auth::user()->peran == 'pimpinan')
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="statistics-card">

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-column justify-content-between align-items-start">
                                    <h5 class="content-desc">Data Hasil Perhitungan</h5>

                                    <h3 class="statistics-value">
                                        {{ $nilai->count() }}
                                    </h3>
                                </div>

                                <button class="btn-statistics">
                                   <a href="{{ route('data-laporan') }}"> <img src="./assets/img/global/times.svg" alt=""></a>
                                </button>
                            </div>

                        </div>
                    </div>
                    @endif


                </div>

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
