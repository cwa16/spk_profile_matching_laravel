<!doctype html>
<html lang="en">

@extends('includes.head')
@section('title', 'Data Karyawan')

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
                            <h2 class="content-title">Data Karyawan</h2>
                        </div>
                    </div>

                    <form action="{{ route('update-data-karyawan') }}" method="post">
                        @csrf
                        <div class="statistics-card">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">NIK</label>
                                <input type="hidden" name="id" class="form-control" value="{{ $data->id }}">
                                <input type="text" name="nik" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Masukan NIK" value="{{ $data->nik }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Masukan Nama" value="{{ $data->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="" class="form-control">
                                    <option value="{{ $data->jenis_kelamin }}" selected >{{ $data->jenis_kelamin }}</option>
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Jabatan</label>
                                <select name="jabatan" id="" class="form-control">
                                    <option value="{{ $data->jabatan_id }}" selected>{{ $data->jabatan->nama_jabatan }}</option>
                                  @foreach ($jabatan as $item)
                                      <option value="{{ $item->id }}">{{ $item->nama_jabatan }}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Golongan</label>
                                <select name="golongan" id="" class="form-control">
                                    <option value="{{ $data->golongan_id }}" selected>{{ $data->golongan->golongan }}</option>
                                    @foreach ($golongan as $item)
                                        <option value="{{ $item->id }}">{{ $item->golongan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary btn-sm">Update</button>
                                <a href="{{ URL::previous() }}" class="btn btn-secondary btn-sm">Batal</a>
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
