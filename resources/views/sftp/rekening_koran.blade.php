<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rekening Koran</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <table class="table table-sm table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Bank</th>
                            <th>Nomor</th>
                            <th>Tanggal</th>
                            <th>Tipe</th>
                            <th>Nominal</th>
                            <th>Uraian</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rekening_koran as $r)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $r->bank }}</td>
                                <td>{{ $r->nomor }}</td>
                                <td>{{ $r->tanggal }}</td>
                                <td>{{ $r->tipe }}</td>
                                <td>{{ $r->nominal }}</td>
                                <td>{{ $r->uraian }}</td>
                                <td>{{ $r->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
