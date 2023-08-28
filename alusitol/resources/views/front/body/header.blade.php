<!-- Tambahkan script library SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Tambahkan script jQuery jika belum termasuk -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <img src="{{ asset('front/assets/img/logositoluama.png') }}" style="width: 3.5em" alt="">
        <h1 class="logo me-auto"><a href="{{ route('home.user') }}">Sitoluama</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="{{ request()->routeIs('home.user') ? 'active' : '' }}"
                        href="{{ route('home.user') }}">Home</a></li>
                <li><a class="{{ request()->routeIs('tentangdesa.user') ? 'active' : '' }}"
                        href="{{ route('tentangdesa.user') }}">Tentang desa</a></li>
                <li><a class="{{ request()->routeIs('layanan.user') ? 'active' : '' }}"
                        href="{{ route('layanan.user') }}">Jelajah desa</a></li>
                <li><a class="{{ request()->routeIs('berita.user') ? 'active' : '' }}"
                        href="{{ route('berita.user') }}">Berita Desa</a></li>
                <li><a class="{{ request()->routeIs('galeri.user') ? 'active' : '' }}"
                        href="{{ route('galeri.user') }}">Galeri</a></li>
                <li><a class="{{ request()->routeIs('all.alualu') ? 'active' : '' }}"
                        href="{{ route('alualu.user') }}">Alu - Alu</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
        @if (Auth::check())
            <div class="dropdown">
                <a href="#" class="get-started-btnn">{{ Auth::user()->username }}</a>
                <div class="dropdown-content">
                    <a href="#" style="color: red; font-weight: 600;" onclick="confirmLogout(event)">
                        Logout 🔓
                    </a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <script>
                        function confirmLogout(event) {
                            event.preventDefault();

                            Swal.fire({
                                title: 'Are you sure?',
                                text: 'Do you want to logout?',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Yes',
                                cancelButtonText: 'No',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Jika memilih "Yes", submit form logout
                                    document.getElementById('logout-form').submit();
                                }
                            });
                        }
                    </script>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        @else
            <button class="get-started-btn">Login</button>
        @endif



    </div>
    <!-- Script untuk menampilkan modal saat tombol ditekan -->
    <script>
        $(document).ready(function() {
            $('.get-started-btn').click(function() {
                $('#loginModal').modal('show');
            });
        });
    </script>
</header>
