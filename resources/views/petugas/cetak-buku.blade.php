<!DOCTYPE html>
<html>

<head>
    <title>Cetak Data Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>BUKU PERPUSTAKAAN <br> SMKN 4 PAYAKUMBUH</h4>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($buku as $b)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $b->judul }}</td>
                    <td>{{ $b->penulis }}</td>
                    <td>{{ $b->penerbit }}</td>
                    <td>{{ $b->tahun_terbit }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>
