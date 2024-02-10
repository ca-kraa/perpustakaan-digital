<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Peminjaman</title>
    @vite('resources/css/app.css')
    <link href="{{ asset('assets/icon') }}/css/fontawesome.css" rel="stylesheet">
    <link href="{{ asset('assets/icon') }}/css/brands.css" rel="stylesheet">
    <link href="{{ asset('assets/icon') }}/css/solid.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen font-mono select-none">
    <div class="max-w-sm mx-auto rounded overflow-hidden shadow-lg bg-white">
        <div class="bg-blue-500 text-white p-4">
            <h2 class="text-lg font-semibold text-center">Detail Peminjaman</h2>
        </div>
        <div class="p-6">
            <div class="mb-4">
                <label for="id_user" class="block text-gray-700"><span class="font-bold"><i
                            class="fa-solid fa-user mr-2"></i>Nama Peminjam : </span> <span
                        class="text-gray-700">{{ $peminjam->user->namaLengkap }}</span> </label>
            </div>

            <div class="mb-4">
                <label for="id_buku" class="block text-gray-700"><span class="font-bold"><i
                            class="fa-solid fa-book mr-2"></i>Judul Buku :</span> <span
                        class="text-gray-700">{{ $peminjam->buku->judul }}</span></label>
            </div>

            <div class="mb-4">
                <label for="tanggal_peminjaman" class="block text-gray-700"><span class="font-bold"><i
                            class="fa-solid fa-calendar mr-2"></i>Tanggal Peminjaman
                        :</span> <span class="text-gray-700">{{ $peminjam['tanggal_peminjaman'] }}</span></label>
            </div>

            <div class="mb-4">
                <label for="tanggal_pengembalian" class="block text-gray-700"><span class="font-bold"><i
                            class="fa-solid fa-calendar mr-2"></i>Tanggal
                        Pengembalian :</span> <span class="text-gray-700">{{ $peminjam['tanggal_pengembalian'] }}</span>
                </label>
            </div>

            <div class="mb-4">
                <label for="status_peminjam" class="block text-gray-700"><span class="font-bold"><i
                            class="fa-solid fa-user-clock mr-2"></i>Status Peminjam
                        :</span> <span
                        class="inline-block px-3 py-1 text-xs font-semibold leading-tight
                    @if ($peminjam['status_peminjam'] === 'Pending') bg-gray-400
                    @elseif($peminjam['status_peminjam'] === 'Belum Di Kembalikan') bg-red-500
                    @else bg-green-500 @endif
                    rounded-full">
                        {{ $peminjam['status_peminjam'] }}
                    </span></label>
            </div>

        </div>
    </div>

</body>


</html>
