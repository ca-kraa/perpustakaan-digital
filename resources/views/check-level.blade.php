<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if (Auth::check())
        @if (Auth::user()->level == 'admin')
            <meta http-equiv="refresh" content="1;url=admin/dashboard">
        @elseif (Auth::user()->level == 'petugas')
            <meta http-equiv="refresh" content="1;url=petugas/dashboard">
        @elseif (Auth::user()->level == 'peminjam')
            <meta http-equiv="refresh" content="1;url=peminjam/dashboard">
        @endif
    @endif
</head>

<body>

</body>

</html>
