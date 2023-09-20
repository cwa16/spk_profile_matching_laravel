<!doctype html>
<html lang="en">

@extends('includes.head')
@section('title', 'Data golongan')

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
                            <h2 class="content-title">Data golongan</h2>
                        </div>
                    </div>

                    <form action="{{ route('store-data-golongan') }}" method="post">
                        @csrf
                        <div class="statistics-card">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">golongan</label>
                                <input type="text" name="golongan" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Masukan Nama">
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
