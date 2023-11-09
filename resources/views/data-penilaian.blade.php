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
                        <h2 class="content-title">Nilai Total</h2>
                    </div>

                    <div class="statistics-card">
                        <table class="table table-bordered table-striped table-sm table-hover mt-2 mb-2">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="align-middle">No</th>
                                    <th rowspan="2" class="align-middle">Alternatif</th>
                                    @foreach ($aspek as $key => $item)
                                        @if ($item->aspek == 'Aspek Tingkat Pendidikan')
                                            <th colspan="3" class="text-center">{{ $item->aspek }}</th>
                                        @else
                                            <th colspan="2" class="text-center">{{ $item->aspek }}</th>
                                        @endif
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($aspek as $key => $item)
                                        @foreach ($item->sub_kriteria as $itemx)
                                            <th>{{ $itemx->nama_sub_kriteria }}</th>
                                        @endforeach
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($karyawan as $i => $item)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $item->nama }}</td>
                                        @foreach ($item->nilai as $item1)
                                            <td>{{ $item1->nilai }}</td>
                                        @endforeach
                                    </tr>

                                @empty

                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2">Nilai Kriteria</th>
                                    @foreach ($k as $item)
                                        <th>{{ $item->nilai }}</th>
                                    @endforeach
                                </tr>
                            </tfoot>

                        </table>

                        <div class="statistics-card peta-gap" style="overflow: auto;">
                            <table class="table table-bordered table-striped mb-2">
                                <thead>
                                    <tr>
                                        <th>Pemetaan GAP :</th>
                                    </tr>
                                    <tr>
                                        <th rowspan="2" class="align-middle">No</th>
                                        <th rowspan="2" class="align-middle">Alternatif</th>
                                        @foreach ($aspek as $key => $item)
                                            @if ($item->aspek == 'Aspek Tingkat Pendidikan')
                                                <th colspan="3" class="text-center">{{ $item->aspek }}</th>
                                            @else
                                                <th colspan="2" class="text-center">{{ $item->aspek }}</th>
                                            @endif
                                        @endforeach
                                    </tr>
                                    <tr>
                                        @foreach ($aspek as $key => $item)
                                            @foreach ($item->sub_kriteria as $itemx)
                                                <th>{{ $itemx->nama_sub_kriteria }}</th>
                                            @endforeach
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($karyawan as $i => $item)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $item->nama }}</td>

                                            @foreach ($item->nilai as $key => $item1)
                                                @foreach ($k1 as $item2)
                                                    @if ($loop->first)
                                                        <td>{{ $item1->nilai - $k1[$key] }}</td>
                                                    @endif
                                                @endforeach
                                            @endforeach


                                        </tr>

                                    @empty

                                    @endforelse
                                </tbody>
                            </table>
                        </div>


                        <div class="statistics-card gap" style="overflow: auto;">
                            <table class="table table-bordered table-striped mb-2 table-bobot">
                                <thead>
                                    <tr>
                                        <th>Pembobotan GAP :</th>
                                    </tr>
                                    <tr>
                                        <th rowspan="2" class="align-middle">No</th>
                                        <th rowspan="2" class="align-middle">Alternatif</th>
                                        @foreach ($aspek as $key => $item)
                                            @if ($item->aspek == 'Aspek Tingkat Pendidikan')
                                                <th colspan="3" class="text-center">{{ $item->aspek }}</th>
                                            @else
                                                <th colspan="2" class="text-center">{{ $item->aspek }}</th>
                                            @endif
                                        @endforeach
                                    </tr>
                                    <tr>
                                        @foreach ($aspek as $key => $item)
                                            @foreach ($item->sub_kriteria as $itemx)
                                                <th>{{ $itemx->nama_sub_kriteria }}</th>
                                            @endforeach
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @forelse ($karyawan as $i => $item)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $item->nama }}</td>
                                        @foreach ($item->nilai as $key => $item1)
                                            @foreach ($k1 as $item2)
                                                @if ($loop->first)
                                                    @switch($item1->nilai-$k1[$key])
                                                        @case(0)
                                                            <td>5</td>
                                                        @break

                                                        @case(1)
                                                            <td>4.5</td>
                                                        @break

                                                        @case(-1)
                                                            <td>4</td>
                                                        @break

                                                        @case(2)
                                                            <td>3.5</td>
                                                        @break

                                                        @case(-2)
                                                            <td>3</td>
                                                        @break

                                                        @case(3)
                                                            <td>2.5</td>
                                                        @break

                                                        @case(-3)
                                                            <td>2</td>
                                                        @break

                                                        @case(4)
                                                            <td>1.5</td>
                                                        @break

                                                        @case(-4)
                                                            <td>1.0</td>
                                                        @break
                                                    @endswitch
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </tr>

                                    @empty

                                        @endforelse
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>

                        <div class="statistics-card faktor" style="overflow: auto;">
                            <table class="table table-bordered table-striped mb-2 table-faktor">
                                <thead>
                                    <tr>
                                        <th>Perhitungan Faktor :</th>
                                    </tr>
                                    <tr>
                                        <th rowspan="2" class="align-middle">No</th>
                                        <th rowspan="2" class="align-middle">Alternatif</th>
                                        @foreach ($aspek as $key => $item)
                                            @if ($item->aspek == 'Aspek Tingkat Pendidikan')
                                                <th colspan="3" class="text-center">{{ $item->aspek }}</th>
                                            @else
                                                <th colspan="2" class="text-center">{{ $item->aspek }}</th>
                                            @endif
                                        @endforeach
                                        @foreach ($aspek as $key => $item)
                                            @if ($item->aspek == 'Aspek Tingkat Pendidikan')
                                                <th colspan="2" class="text-center">{{ $item->aspek }}</th>
                                            @else
                                                <th colspan="2" class="text-center">{{ $item->aspek }}</th>
                                            @endif
                                        @endforeach
                                        <th rowspan="2" class="align-middle">Final</th>
                                    </tr>
                                    <tr>
                                        @foreach ($aspek as $key => $item)
                                            @foreach ($item->sub_kriteria as $itemx)
                                                <th>{{ $itemx->nama_sub_kriteria }} ({{ $itemx->faktor }})</th>
                                            @endforeach
                                        @endforeach
                                        <th>NSF</th>
                                        <th>NCF</th>
                                        <th>NSF</th>
                                        <th>NCF</th>
                                        <th>NSF</th>
                                        <th>NCF</th>
                                        <th>NSF</th>
                                        <th>NCF</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="{{ route('store-data-laporan') }}" method="post">
                                        @csrf
                                        @forelse ($karyawan as $i => $item)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td><input type="hidden" name="tanggal[]" id="" value="{{ $tanggal }}">
                                                <input type="text" class="nama" name="namas[]" id="namas" value="{{ $item->nama }}" readonly></td>

                                            @foreach ($item->nilai as $key => $item1)
                                                @foreach ($k1 as $item2)
                                                    @if ($loop->first)
                                                        @foreach ($ks as $item)
                                                            @if ($loop->first)
                                                                @switch($item1->nilai-$k1[$key])
                                                                    @case(0)
                                                                        <td>
                                                                            @if ($item1->sub_kriteria_id == 2 || $item1->sub_kriteria_id == 3)
                                                                                {{ 5 / 2 }}
                                                                            @else
                                                                                {{ 5 / 1 }}
                                                                            @endif

                                                                        </td>
                                                                    @break

                                                                    @case(1)
                                                                        <td>
                                                                            @if ($item1->sub_kriteria_id == 2 || $item1->sub_kriteria_id == 3)
                                                                                {{ 4.5 / 2 }}
                                                                            @else
                                                                                {{ 4.5 / 1 }}
                                                                            @endif
                                                                        </td>
                                                                    @break

                                                                    @case(-1)
                                                                        <td>
                                                                            @if ($item1->sub_kriteria_id == 2 || $item1->sub_kriteria_id == 3)
                                                                                {{ 4 / 2 }}
                                                                            @else
                                                                                {{ 4 / 1 }}
                                                                            @endif
                                                                        </td>
                                                                    @break

                                                                    @case(2)
                                                                        <td>
                                                                            @if ($item1->sub_kriteria_id == 2 || $item1->sub_kriteria_id == 3)
                                                                                {{ 3.5 / 2 }}
                                                                            @else
                                                                                {{ 3.5 / 1 }}
                                                                            @endif
                                                                        </td>
                                                                    @break

                                                                    @case(-2)
                                                                        <td>
                                                                            @if ($item1->sub_kriteria_id == 2 || $item1->sub_kriteria_id == 3)
                                                                                {{ 3 / 2 }}
                                                                            @else
                                                                                {{ 3 / 1 }}
                                                                            @endif
                                                                        </td>
                                                                    @break

                                                                    @case(3)
                                                                        <td>
                                                                            @if ($item1->sub_kriteria_id == 2 || $item1->sub_kriteria_id == 3)
                                                                                {{ 2.5 / 2 }}
                                                                            @else
                                                                                {{ 2.5 / 1 }}
                                                                            @endif
                                                                        </td>
                                                                    @break

                                                                    @case(-3)
                                                                        <td>
                                                                            @if ($item1->sub_kriteria_id == 2 || $item1->sub_kriteria_id == 3)
                                                                                {{ 2 / 2 }}
                                                                            @else
                                                                                {{ 2 / 1 }}
                                                                            @endif
                                                                        </td>
                                                                    @break

                                                                    @case(4)
                                                                        <td>
                                                                            @if ($item1->sub_kriteria_id == 2 || $item1->sub_kriteria_id == 3)
                                                                                {{ 1.5 / 2 }}
                                                                            @else
                                                                                {{ 1.5 / 1 }}
                                                                            @endif
                                                                        </td>
                                                                    @break

                                                                    @case(-4)
                                                                        <td>
                                                                            @if ($item1->sub_kriteria_id == 2 || $item1->sub_kriteria_id == 3)
                                                                                {{ 1 / 2 }}
                                                                            @else
                                                                                {{ 1 / 1 }}
                                                                            @endif
                                                                        </td>
                                                                    @break
                                                                @endswitch
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endforeach

                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><input type="text" class="final" name="final[]" id="final" width="130" readonly></td>

                                        </tr>

                                        @empty

                                        @endforelse
                                        <input type="text" class="form-control mb-3" name="subjek" id="" placeholder="Masukkan Subject (cth: Promosi Jabatan Staff IT)" required>
                                        <button class="btn btn-primary mb-3" type="submit">Simpan</button>
                                    </form>


                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Persentase Faktor :</th>
                                            <th><input type="text" class="form-control" name="" id="sf"
                                                    value="{{ $nsf }}" readonly></th>
                                            <th><input type="text" class="form-control" name="" id="cf"
                                                    value="{{ $ncf }}" readonly></th>

                                            <th>Persentase Kriteria :</th>
                                            <th><input type="text" class="form-control" name="" id="per_tp"
                                                    value="{{ $per_tp }}" readonly></th>
                                            <th><input type="text" class="form-control" name="" id="per_pk"
                                                    value="{{ $per_pk }}" readonly></th>
                                            <th><input type="text" class="form-control" name="" id="per_sk"
                                                    value="{{ $per_sk }}" readonly></th>
                                            <th><input type="text" class="form-control" name="" id="per_k"
                                                    value="{{ $per_k }}" readonly></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>





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

            <script>
                $(document).ready(function() {

                    function addCommas(nStr) {
                        nStr += '';
                        x = nStr.split('.');
                        x1 = x[0];
                        x2 = x.length > 1 ? '.' + x[1] : '';
                        var rgx = /(\d+)(\d{3})/;
                        while (rgx.test(x1)) {
                            x1 = x1.replace(rgx, '$1' + ',' + '$2');
                        }
                        return x1 + x2;
                    }

                    var nsf = $('#sf').val();
                    var ncf = $('#cf').val();

                    var per_tp = $('#per_tp').val();
                    var per_pk = $('#per_pk').val();
                    var per_sk = $('#per_sk').val();
                    var per_k = $('#per_k').val();

                    $('.table-faktor tr:gt(0)').each(function() {

                        var tp = $(this).find('td:nth(2)').text();
                        var lm = $(this).find('td:nth(3)').text();
                        var g = $(this).find('td:nth(4)').text();

                        var nsftp = ((+(nsf) / 100) * ((+(lm) + +(g))));
                        var ncftp = ((+(ncf) / 100) * (+(tp)));

                        $(this).find('td:nth(11)').text(addCommas(nsftp.toFixed(2)));
                        $(this).find('td:nth(12)').text(addCommas(ncftp.toFixed(2)));

                        var pm = $(this).find('td:nth(5)').text();
                        var k = $(this).find('td:nth(6)').text();

                        var ncfpk = ((+(ncf) / 100) * (+(pm)));
                        var nsfpk = ((+(nsf) / 100) * (+(k)));

                        $(this).find('td:nth(13)').text(nsfpk.toFixed(2));
                        $(this).find('td:nth(14)').text(ncfpk.toFixed(2));

                        var d = $(this).find('td:nth(7)').text();
                        var ks = $(this).find('td:nth(8)').text();

                        var ncfsk = ((+(ncf) / 100) * (+(d)));
                        var nsfsk = ((+(nsf) / 100) * (+(ks)));

                        $(this).find('td:nth(15)').text(nsfsk.toFixed(2));
                        $(this).find('td:nth(16)').text(ncfsk.toFixed(2));

                        var ko = $(this).find('td:nth(9)').text();
                        var ing = $(this).find('td:nth(10)').text();

                        var ncfk = ((parseFloat(ncf).toFixed(2) / 100) * (parseFloat(ko).toFixed(2)));
                        var nsfk = ((parseFloat(nsf).toFixed(2) / 100) * (parseFloat(ing).toFixed(2)));

                        $(this).find('td:nth(17)').text(nsfk.toFixed(2));
                        $(this).find('td:nth(18)').text(ncfk.toFixed(2));

                        var tp_cf = $(this).find('td:nth(11)').text();
                        var tp_sf = $(this).find('td:nth(12)').text();

                        var pk_cf = $(this).find('td:nth(13)').text();
                        var pk_sf = $(this).find('td:nth(14)').text();

                        var sk_cf = $(this).find('td:nth(15)').text();
                        var sk_sf = $(this).find('td:nth(16)').text();

                        var k_cf = $(this).find('td:nth(17)').text();
                        var k_sf = $(this).find('td:nth(18)').text();

                        var sum_tp = ((+(tp_sf) + +(tp_cf)) * (+(per_tp) / 100));
                        var sum_pk = ((+(pk_cf) + +(pk_sf)) * (+(per_pk) / 100));
                        var sum_sk = ((+(sk_cf) + +(sk_sf)) * (+(per_sk) / 100));
                        var sum_k = ((+(k_cf) + +(k_sf)) * (+(per_k) / 100));



                        var sum_final = (parseFloat(sum_tp) + parseFloat(sum_pk) + parseFloat(sum_sk) + parseFloat(
                            sum_k));
                        $(this).find('.final').val(sum_final.toFixed(2));
                    });


                });
            </script>
        </body>

        </html>
