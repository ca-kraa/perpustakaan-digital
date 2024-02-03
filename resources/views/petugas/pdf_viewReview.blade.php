<!DOCTYPE html>
<html>

<head>
    <title>Data Review</title>
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
    <h2 style="text-align: center">Data Review</h2>
    <table>
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
            @foreach ($data as $key => $review)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $review['id_user'] }}</td>
                    <td>{{ $review['id_buku'] }}</td>
                    <td>{{ $review['ulasan'] }}</td>
                    <td>{{ $review['rating'] }}</td>
                    <td>{{ $review['created_at'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
