<!doctype html>
<html lang="en">

@extends('includes.head')
@section('title', 'Data Faktor')

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
                        <h2 class="content-title">Data Faktor</h2>
                    </div>

                    <form action="{{ route('store-data-faktor') }}" method="post">
                        @csrf
                        <div class="statistics-card">
                            <div class="alert alert-warning text-center" role="alert">
                                INFORMASI: Mohon untuk menginput secara berurutan dari aspek pertama sampai terakhir.
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input uniforms" type="radio" name="inlineRadioOptions"
                                    id="inlineRadio4" value="4">
                                <label class="form-check-label" for="inlineRadio3">Aspek Tingkat Pendidikan, Golongan &
                                    Lama Bekerja</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input uniforms" type="radio" name="inlineRadioOptions"
                                    id="pkradio" value="1">
                                <label class="form-check-label" for="inlineRadio1">Aspek Perilaku Kerja</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input uniforms" type="radio" name="inlineRadioOptions"
                                    id="skradio" value="2">
                                <label class="form-check-label" for="inlineRadio2">Aspek Sikap Kerja</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input uniforms" type="radio" name="inlineRadioOptions"
                                    id="kradio" value="3">
                                <label class="form-check-label" for="inlineRadio3">Aspek Kecerdasan</label>
                            </div>



                            <div class="" id="pk">
                                <form action="{{ route('store-data-faktor') }}" method="post">
                                    @csrf
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <table
                                                class="table table-striped table-sm table-hover table-responsive mt-2">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" class="align-middle">No.</th>
                                                        <th rowspan="2" class="align-middle">Alternatif</th>

                                                    </tr>
                                                    <tr>
                                                        @foreach ($subKriteria->where('kriteria_id', 2) as $item)
                                                            <th><input type="hidden" name="kriteria" id=""
                                                                    value="{{ $item->kriteria->nama_kriteria }}">
                                                                <input type="hidden" name="sub_kriteria_id[]"
                                                                    value="{{ $item->id }}">{{ $item->nama_sub_kriteria }}
                                                            </th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($n as $item)
                                                        <input type="hidden" name="ids[]"
                                                            value="{{ $item->id }}">
                                                    @endforeach
                                                    @foreach ($kary as $key => $item3)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td><input type="hidden" name="karyawan_id[]"
                                                                    value="{{ $item3->id }}">{{ $item3->nama }}</td>
                                                            @foreach ($subKriteria->where('kriteria_id', 2) as $item4)
                                                                <td>
                                                                    <input type="number" name="nilai[]" id=""
                                                                        class="form-control">
                                                                </td>
                                                            @endforeach

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" name="action" submit" value="sync">Sync</button>
                                    <button class="btn btn-primary" name="action" submit"
                                        value="save">Submit</button>
                                </form>
                            </div>

                            <div class="" id="sk">
                                <form action="{{ route('store-data-faktor') }}" method="post">
                                    @csrf
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <table
                                                class="table table-striped table-sm table-hover table-responsive mt-2">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" class="align-middle">No.</th>
                                                        <th rowspan="2" class="align-middle">Alternatif</th>

                                                    </tr>
                                                    <tr>
                                                        @foreach ($subKriteria->where('kriteria_id', 3) as $item)
                                                            <th><input type="hidden" name="kriteria" id=""
                                                                    value="{{ $item->kriteria->nama_kriteria }}">
                                                                <input type="hidden" name="sub_kriteria_id[]"
                                                                    value="{{ $item->id }}">{{ $item->nama_sub_kriteria }}
                                                            </th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($n->whereIn('sub_kriteria_id', [5, 6]) as $item)
                                                        <input type="hidden" name="ids[]"
                                                            value="{{ $item->id }}">
                                                    @endforeach
                                                    @foreach ($kary as $key => $item3)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td><input type="hidden" name="karyawan_id[]"
                                                                    value="{{ $item3->id }}">{{ $item3->nama }}
                                                            </td>
                                                            @foreach ($subKriteria->where('kriteria_id', 3) as $item4)
                                                                <td>
                                                                    <input type="number" name="nilai[]"
                                                                        id="" class="form-control">
                                                                </td>
                                                            @endforeach

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" name="action" submit"
                                        value="sync">Sync</button>
                                    <button class="btn btn-primary" name="action" submit"
                                        value="save">Submit</button>
                                </form>
                            </div>

                            <div class="" id="k">
                                <form action="{{ route('store-data-faktor') }}" method="post">
                                    @csrf
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <table
                                                class="table table-striped table-sm table-hover table-responsive mt-2">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" class="align-middle">No.</th>
                                                        <th rowspan="2" class="align-middle">Alternatif</th>

                                                    </tr>
                                                    <tr>
                                                        @foreach ($subKriteria->where('kriteria_id', 4) as $item)
                                                            <th><input type="hidden" name="kriteria" id=""
                                                                    value="{{ $item->kriteria->nama_kriteria }}">
                                                                <input type="hidden" name="sub_kriteria_id[]"
                                                                    value="{{ $item->id }}">{{ $item->nama_sub_kriteria }}
                                                            </th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($n->where('sub_kriteria_id', 4) as $item)
                                                        <input type="hidden" name="ids[]"
                                                            value="{{ $item->id }}">
                                                    @endforeach
                                                    @foreach ($kary as $key => $item3)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td><input type="hidden" name="karyawan_id[]"
                                                                    value="{{ $item3->id }}">{{ $item3->nama }}
                                                            </td>
                                                            @foreach ($subKriteria->where('kriteria_id', 3) as $item4)
                                                                <td>
                                                                    <input type="number" name="nilai[]"
                                                                        id="" class="form-control">
                                                                </td>
                                                            @endforeach

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" name="action" submit"
                                        value="sync">Sync</button>
                                    <button class="btn btn-primary" name="action" submit"
                                        value="save">Submit</button>
                                </form>
                            </div>

                            <div class="" id="g">
                                <form action="{{ route('store-data-faktor') }}" method="post">
                                    @csrf
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <table
                                                class="table table-striped table-sm table-hover table-responsive mt-2">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" class="align-middle">No.</th>
                                                        <th rowspan="2" class="align-middle">Alternatif</th>

                                                    </tr>
                                                    <tr>
                                                        @foreach ($subKriteria->where('kriteria_id', 1) as $item)
                                                            <th><input type="hidden" name="kriteria" id=""
                                                                    value="{{ $item->kriteria->nama_kriteria }}">
                                                                <input type="hidden" name="sub_kriteria_id[]"
                                                                    value="{{ $item->id }}">{{ $item->nama_sub_kriteria }}
                                                            </th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($n->whereIn('sub_kriteria_id', [5, 6]) as $item)
                                                        <input type="hidden" name="ids[]"
                                                            value="{{ $item->id }}">
                                                    @endforeach
                                                    @foreach ($kary as $key => $item3)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td><input type="hidden" name="karyawan_id[]"
                                                                    value="{{ $item3->id }}">{{ $item3->nama }}
                                                            </td>
                                                            @foreach ($subKriteria->where('kriteria_id', 1) as $item4)
                                                                <td>
                                                                    <input type="number" name="nilai[]"
                                                                        id="" class="form-control">
                                                                </td>
                                                            @endforeach

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" name="action" submit"
                                        value="sync">Sync</button>
                                    <button class="btn btn-primary" name="action" submit"
                                        value="save">Submit</button>
                                </form>
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

            document.addEventListener("DOMContentLoaded", function() {
                var elements = document.getElementsByTagName("INPUT");
                for (var i = 0; i < elements.length; i++) {
                    elements[i].oninvalid = function(e) {
                        e.target.setCustomValidity("");
                        if (!e.target.validity.valid) {
                            e.target.setCustomValidity("Inputan tidak boleh kosong");
                        }
                    };
                    elements[i].oninput = function(e) {
                        e.target.setCustomValidity("");
                    };
                }
            })
        </script>
        <script>
            $(document).ready(function() {
                $('#pk').hide();
                $('#sk').hide();
                $('#k').hide();
                $('#g').show();

                $('.uniforms').click(function() {
                    var check = $('.uniforms:checked').val();
                    if (check == 1) {
                        $('#pk').show('slow');
                        $('#sk').hide('slow');
                        $('#k').hide('slow');
                        $('#g').hide('slow');
                    } else if (check == 2) {
                        $('#sk').show('slow');
                        $('#pk').hide('slow');
                        $('#k').hide('slow');
                        $('#g').hide('slow');

                    } else if (check == 3) {
                        $('#sk').hide('slow');
                        $('#pk').hide('slow');
                        $('#k').show('slow');
                        $('#g').hide('slow');

                    } else if (check == 4) {
                        $('#sk').hide('slow');
                        $('#pk').hide('slow');
                        $('#k').hide('slow');
                        $('#g').show('slow');

                    }
                });
            });
        </script>
</body>

</html>
