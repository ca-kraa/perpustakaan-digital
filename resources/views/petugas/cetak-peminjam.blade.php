<!DOCTYPE html>
<html>

<head>
    <title>Cetak Data Peminjam</title>
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
        <h5>Data Peminjam <br> SMKN 4 PAYAKUMBUH</h4>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Status Peminjam</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($data as $peminjam)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $peminjam['id_user'] }}</td>
                    <td>{{ $peminjam['id_buku'] }}</td>
                    <td>{{ $peminjam['tanggal_peminjaman'] }}</td>
                    <td>{{ $peminjam['tanggal_pengembalian'] }}</td>
                    <td>{{ $peminjam['status_peminjam'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>
