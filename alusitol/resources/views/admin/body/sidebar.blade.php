<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        <li>
            <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a href="{{ route('all.alualu') }}" class="waves-effect">
                <i class="fab fa-twitch"></i>
                <span>Alu - Alu</span>
            </a>
        </li>

        <li>
            <a href="#" class="has-arrow waves-effect">
                <i class="ri-computer-line"></i>
                <span>Tentang Desa</span>
            </a>
            <ul class="sub-menu">
                <li><a href="{{ route('all.tentang.desa') }}">Tentang Desa</a></li>
                <li><a href="{{ route('add.tentang.desa') }}">Tambahkan Tentang Desa</a></li>
            </ul>
        </li>


        <!--Berita-->
        <li>
            <a href="#" class="has-arrow waves-effect">
                <i class="ri-article-line"></i>
                <span>Berita</span>
            </a>
            <ul class="sub-menu">
                <li><a href="{{ route('all.berita') }}">Semua Berita</a></li>
                <li><a href="{{ route('add.berita') }}">Tambahkan Berita</a></li>
            </ul>
        </li>

        <!--Kategori Berita-->
        <li>
            <a href="#" class="has-arrow waves-effect">
                <i class="ri-list-check"></i>
                <span>Kategori Berita</span>
            </a>
            <ul class="sub-menu">
                <li><a href="{{ route('all.berita.category') }}">Semua Kategori Berita</a></li>
                <li><a href="{{ route('add.berita.category') }}">Tambahkan Kategori Berita</a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="has-arrow waves-effect">
                <i class="mdi mdi-folder-multiple-image"></i>
                <span>Galeri</span>
            </a>
            <ul class="sub-menu">
                <li><a href="{{ route('all.galeri') }}">Semua Galeri</a></li>
                <li><a href="{{ route('add.galeri') }}">Tambahkan Galeri</a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="has-arrow waves-effect">
                <i class="ri-contacts-book-line"></i>
                <span>Jelajah Desa</span>
            </a>
            <ul class="sub-menu">
                <li><a href="{{ route('all.layanan') }}">Semua Jelajah </a></li>
                <li><a href="{{ route('add.layanan') }}">Tambahkan Jelajah </a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="has-arrow waves-effect">
                <i class="fab fa-slack-hash"></i>
                <span>Kategori Layanan Desa</span>
            </a>
            <ul class="sub-menu">
                <li><a href="{{ route('all.layanan.category') }}">Semua Kategori Jelajah Desa</a></li>
                <li><a href="{{ route('add.layanan.category') }}">Tambahkan Kategori Jelajah Desa</a></li>
            </ul>
        </li>
    </ul>
</div>
