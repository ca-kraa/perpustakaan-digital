<!DOCTYPE html>
<html>

<head>
    <title>Data Peminjam</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center">Data Peminjam</h2>
    <table>
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
            @foreach ($data as $key => $peminjam)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $peminjam['id_user'] }}</td>
                    <td>{{ $peminjam['id_buku'] }}</td>
                    <td>{{ $peminjam['tanggal_peminjaman'] }}</td>
                    <td>{{ $peminjam['tanggal_pengembalian'] }}</td>
                    <td>{{ $peminjam['status_peminjam'] }}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
</body>

</html>
