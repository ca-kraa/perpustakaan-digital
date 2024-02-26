<!DOCTYPE html>
<html>
    <head>
        <title>Data Buku</title>
        <style>

.container {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    width: 80%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.img-kiri, .img-kanan {
    position: absolute;
    top: 0;
    width: 12%; 
	height: auto'
    object-fit: cover;
    margin-top: 5%;
}

.img-kiri {
    left: 0;
}

.img-kanan {
    right: 0;
}

.text-center {
    flex: 1;
    text-align: center;
}

.judul {
    font-size: 15px;
    font-weight: bold;
}

.subjudul {
    font-size: 15px;
    margin-bottom: 1x;
}

.alamat, .kontak {
    font-size: 14px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid black;
    padding: 5px;
}	

.text-right {
    text-align: right !important;
}

.img-ttd {
    width: 100px;
    height: 50px;
    margin-top: 50%; 
    margin-bottom: 20ch;
    float: none;
    display: block;
    margin: 0 auto;
    position: absolute;
    top: 50%;
    left: 90%;
    transform: translate(-50%, -50%);
    font-size: 18px;
}



.nip {
  margin-bottom: 0;
  text-align: right;
  margin-top: -10px;
}   


        </style>
    </head>
    <body>
        <div class="container">
            <div class="text-center">
				<img class="img-kiri" src="{{ public_path('assets/gambar/Logo-sumatra-barat.png') }}" />
				<img class="img-kanan" src="{{ public_path('assets/gambar/smkn4.png') }}" />
                <h1 class="judul">PEMERINTAH PROVINSI SUMATERA BARAT</h1>
                <h2 class="subjudul">DINAS PENDIDIKAN</h2>
                <h3 class="judul">SEKOLAH MENENGAH KEJURUAN NEGERI 4 PAYAKUMBUH</h3>
                <p class="alamat">Jl. Koto Kociak, Kel. Padang Sikabu, Kec Lamposi Tigo Nagori (26219) - Payakumbuh</p>
                <p class="kontak">NPSN: 69947085  Email: smkn4pyk@gmail.com</p>
            </div>
        </div>
        <h2 style="text-align: center">Data Buku</h2>
        {{-- <p>Di Cetak Oleh: {{ Auth::user()->namaLengkap }}</p>
        <p>Tanggal Cetak : {{ date("d/m/Y | H:i:s") }}</p> --}}
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
        <br>
        <br>
        <br>
        <br>
        <?php
use Carbon\Carbon;

Carbon::setLocale('id');


$tanggal = Carbon::now()->format('d F Y');  
?>
        <p class="text-right">Payakumbuh,{{ $tanggal }}</p>
  <p class="text-right" style="text-transform: capitalize;">{{ Auth::user()->level }},</p>
  {{-- <img class="img-ttd" src="{{ public_path('assets/gambar/tanda-tangan.png') }}" alt="Tanda Tangan"> --}}
  <br>
  <br>
  <br>
  <br>
  <p class="text-right" style="text-transform: uppercase; text-decoration: underline; font-weight: bold;">{{ Auth::user()->namaLengkap }}</p>
  {{-- <p class="nip">NIP. 19781016 200604 1 004</p> --}}
    </body>
</html>
