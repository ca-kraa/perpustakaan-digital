<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>badag</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div id="backgroundDiv" class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>

    <script>
        var backgroundDiv = document.getElementById('backgroundDiv');
        fetch('api/2e009559a4784b92b41b5f7941166ecb')
            .then(response => response.json())
            .then(data => {
                var imageUrl = data.urls.regular;
                backgroundDiv.style.backgroundImage = "url('" + imageUrl + "')";
                backgroundDiv.style.backgroundSize = "cover";
                backgroundDiv.style.backgroundPosition = "center";
                backgroundDiv.style.backgroundRepeat = "no-repeat";
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    </script>
</body>

</html>
