<!doctype html>
<html lang="en">

@extends('includes.head')
@section('title', 'Data Pengguna')

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
                            <h2 class="content-title">Edit Data Pengguna</h2>
                        </div>
                    </div>

                    <form action="{{ route('update-data-pengguna') }}" method="post">
                        @csrf
                        <div class="statistics-card">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                <input type="hidden" name="id" class="form-control" value="{{ $data->id }}">
                                <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Masukan Nama" value="{{ $data->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com" value="{{ $data->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Peran</label>
                                <select name="peran" id="" class="form-control">
                                    <option value="{{ $data->peran }}" selected disabled>{{ $data->peran }}</option>
                                    <option value="admin">Admin</option>
                                    <option value="pimpinan">Pimpinan</option>
                                    <option value="hrd">HRD</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Kata Sandi</label>
                                <input type="password" name="password" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Masukan Kata Sandi Baru">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary btn-sm" type="submit">Update</button>
                                <a href="{{ route('data-pengguna') }}" class="btn btn-secondary btn-sm">Batal</a>
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
