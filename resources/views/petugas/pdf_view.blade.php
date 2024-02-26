<!DOCTYPE html>
<html>

				<head>
								<title>Data Buku</title>
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
								<h2 style="text-align: center">Data Buku</h2>
								<p>Di Cetak Oleh: {{ Auth::user()->namaLengkap }}</p>
								<p>Tanggal Cetak : {{ date("d/m/Y | H:i:s") }}</p>
								<table>
												<thead>
																<tr>
																				<th>No</th>
																				<th>Judul</th>
																				<th>Kategori</th>
																				<th>Penulis</th>
																				<th>Penerbit</th>
																				<th>Tahun Terbit</th>
																				<th>Stok</th>
																</tr>
												</thead>
												<tbody>
																@foreach ($data as $key => $buku)
																				<tr>
																								<td>{{ $key + 1 }}</td>
																								<td>{{ $buku["judul"] }}</td>
																								<td>{{ $buku["kategori"] }}</td>
																								<td>{{ $buku["penulis"] }}</td>
																								<td>{{ $buku["penerbit"] }}</td>
																								<td>{{ $buku["tahun_terbit"] }}</td>
																								<td>{{ $buku["stok"] }}</td>
																				</tr>
																@endforeach
												</tbody>
								</table>
				</body>

</html>
