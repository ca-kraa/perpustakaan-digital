<!DOCTYPE html>
<html>

<head>
    <title>Cetak Data Review</title>
    <link href="{{ asset('assets/cdn') }}/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Data Review <br> SMKN 4 PAYAKUMBUH</h4>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengguna</th>
                <th>Judul Buku</th>
                <th>Ulasan</th>
                <th>Rating</th>
                <th>Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($data as $review)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $review['id_user'] }}</td>
                    <td>{{ $review['id_buku'] }}</td>
                    <td>{{ $review['ulasan'] }}</td>
                    <td>{{ $review['rating'] }}</td>
                    <td>{{ $review['created_at'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>
