<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand mt-2 d-flex justify-content-center align-items-center" href="#">
            <span class="ms-1 font-weight-bold text-white">Perpustakaan Digital</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white @if (request()->is('peminjam/home')) active bg-gradient-warning @endif"
                    href="/peminjam/home">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">home</i>
                    </div>
                    <span class="nav-link-text ms-1">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (request()->is('peminjam/buku')) active bg-gradient-warning @endif"
                    href="/peminjam/buku">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">library_books</i>
                    </div>
                    <span class="nav-link-text ms-1">
                        Buku
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (request()->is('peminjam/kategori')) active bg-gradient-warning @endif"
                    href="/peminjam/kategori">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">sort</i>
                    </div>
                    <span class="nav-link-text ms-1">
                        Kategori
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (request()->is('peminjam/peminjam')) active bg-gradient-warning @endif"
                    href="/peminjam/peminjam">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">local_library</i>
                    </div>
                    <span class="nav-link-text ms-1">
                        Peminjam
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (request()->is('peminjam/reviews')) active bg-gradient-warning @endif"
                    href="/peminjam/reviews">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">reviews</i>
                    </div>
                    <span class="nav-link-text ms-1">
                        Ulasan
                    </span>
                </a>
            </li>
            <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8 mt-2">Account pages</h6>
            <li class="nav-item">
                <a class="nav-link text-white @if (request()->is('peminjam/profile')) active bg-gradient-warning @endif"
                    href="/peminjam/profile">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">account_circle</i>
                    </div>
                    <span class="nav-link-text ms-1">
                        Profile
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">logout</i>
                    </div>
                    <span class="nav-link-text ms-1">
                        Logout
                    </span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</aside>
