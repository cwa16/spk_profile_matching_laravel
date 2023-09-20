<!doctype html>
<html lang="en">

@extends('includes.head')
@section('title', 'Laporan')

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
                        <h2 class="content-title">Laporan Hasil Penilaian</h2>
                    </div>

                    <div class="statistics-card">
                        <table class="table table-striped table-sm table-hover table-responsive mt-2">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Subjek</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ $item->subjek }}</td>
                                        <td>
                                            <a href="{{ route('view-data-laporan', $item->id) }}" class="btn btn-secondary btn-sm">
                                                View
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('hapus-data-laporan', $item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">
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
