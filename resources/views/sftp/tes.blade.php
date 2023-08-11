<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                            <th>Name</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($files as $file)
                            @if (substr($file, 0, 1) !== 'S')
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $file }}</td>
                                    <td><a href="{{ route('mandiri.show', $file) }}"
                                            class="btn btn-sm btn-success">View</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
