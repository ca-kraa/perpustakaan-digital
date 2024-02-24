<!DOCTYPE html>
 <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>
 <link href="{{ asset('assets/icon') }}/css/fontawesome.css" rel="stylesheet">
  <link href="{{ asset('assets/icon') }}/css/brands.css" rel="stylesheet">
  <link href="{{ asset('assets/icon') }}/css/solid.css" rel="stylesheet">
      <link href="{{ asset('assets/landwind') }}/output.css" rel="stylesheet">
</head>
<body>
    <header class="fixed w-full">
        <nav class="bg-white border-gray-200 py-2.5 dark:bg-gray-900">
            <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
                <a href="#" class="flex items-center">
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Perpustakaan Digital</span>
                </a>
                <div class="flex items-center lg:order-2">

                </div>
                <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    
                </div>
            </div>
        </nav>
    </header>

    <!-- Start block -->
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">Exploring Boundless Knowledge <br>Digitally.</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Welcome to our digital library, where you can explore a world of boundless knowledge. With a growing collection of books, we offer easy access to a variety of inspiring reading materials. Discover a range of topics from fiction to non-fiction, and enjoy the convenience of reading anywhere, anytime through our user-friendly digital platform.</p>
                <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                    @if (Auth::check())
<button id="homeButton" class="inline-flex items-center justify-center px-5 py-3 text-sm font-medium text-center text-gray-900 border border-gray-200 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
    <i class="fas fa-home mr-2"></i> Home
</button>

@else
    <a href="{{ route('login') }}" class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-medium text-center text-gray-900 border border-gray-200 rounded-lg sm:w-auto hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
        <i class="fas fa-sign-in-alt mr-2"></i> Login
    </a>
    <a href="{{ route('register') }}" class="inline-flex items-center justify-center w-full px-5 py-3 mb-2 mr-2 text-sm font-medium text-gray-900 border border-gray-200 rounded-lg sm:w-auto hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
        <i class="fas fa-user-plus mr-2"></i> Register
    </a>
@endif

                </div>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{ asset('assets/landwind') }}/images/hero.png" alt="hero image">
            </div>                
        </div>
    </section>
 <script>
    document.getElementById('homeButton').addEventListener('click', function(event) {
        event.preventDefault(); // Menghentikan perilaku default dari link

        // Mengubah URL di browser tanpa memuat ulang halaman
        history.pushState(null, null, '{{ url("/home") }}');

        // Redirect ke halaman Home setelah URL diubah
        window.location.href = '{{ url("/home") }}';
    });
</script>

</body>
</html>