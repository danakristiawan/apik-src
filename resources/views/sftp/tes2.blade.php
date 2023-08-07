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
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <table class="table table-sm table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cols as $col)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $col[0] }}</td>
                                <td>{{ $col[1] }}</td>
                                <td>{{ $col[2] }}</td>
                                <td>{{ $col[3] }}</td>
                                <td>{{ $col[4] }}</td>
                                <td>{{ $col[5] }}</td>
                                <td>{{ $col[6] }}</td>
                                <td>{{ $col[7] }}</td>
                                <td>{{ $col[8] }}</td>
                                <td>{{ $col[9] }}</td>
                                <td>{{ $col[10] }}</td>
                                <td>{{ $col[11] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
