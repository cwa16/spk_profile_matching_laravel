<!doctype html>
<html lang="en">
@include('includes.head')
@section('title', 'Laporan')

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                <h3><u>Laporan Hasil Perhitungan Profil Matching</u></h3>
                <h5>{{ $data->subjek }}</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Nilai Akhir</th>
                            <th>Ranking</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($datas as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nilai }}</td>

                                <td>{{ ++$count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
