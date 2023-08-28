<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">

            <button type="button" class="btn btn-sm px-4 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="{{ asset('backend/assets/images/users/avatar-1.jpg') }}" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1">Admin</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->

                    <div class="dropdown-divider"></div>
                    <a id="logout-link" class="dropdown-item text-danger" href="#">
                        <i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout
                    </a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="get" style="display: none;">
                        @csrf
                    </form>

                    <!-- Tambahkan Sweet Alert script -->
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>
                        // Tambahkan event click pada link/logout button
                        document.getElementById('logout-link').addEventListener('click', function(e) {
                            e.preventDefault(); // Mencegah perilaku default dari link/button

                            // Tampilkan Sweet Alert konfirmasi
                            Swal.fire({
                                title: 'Konfirmasi Logout',
                                text: 'Apakah Anda yakin ingin logout?',
                                icon: 'question',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Logout'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Submit form logout jika pengguna menekan tombol Logout di Sweet Alert
                                    document.getElementById('logout-form').submit();
                                }
                            });
                        });
                    </script>


                </div>
            </div>



        </div>
    </div>
</header>
