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
                        <h2 class="content-title">Data Sub Kriteria</h2>
                    </div>

                    <div class="statistics-card">
                        <a href="{{ route('tambah-data-sub-kriteria') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                        <table class="table table-striped table-sm table-hover mt-2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kriteria</th>
                                    <th>Sub Kriteria</th>
                                    <th>Faktor</th>
                                    <th>Nilai</th>
                                    <th>Persentase</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->kriteria->aspek }}</td>
                                        <td>{{ $item->nama_sub_kriteria }}</td>
                                        <td>{{ $item->faktor }}</td>
                                        <td>{{ $item->nilai }}</td>
                                        <td>{{ $item->persentase }}</td>
                                        <td>
                                            <a href="{{ route('edit-data-sub-kriteria', $item->id) }}" class="btn btn-secondary btn-sm">
                                                Ubah
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('hapus-data-sub-kriteria', $item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Belum ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
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
