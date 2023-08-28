<style>
    .teksjalan {
        overflow: hidden;
        /* Menghindari teks melampaui batas kontainer */
        white-space: nowrap;
        /* Menghindari pemisahan kata menjadi baris baru */
        margin: 0;
        /* Hapus margin jika diperlukan */
        letter-spacing: 0.15em;
        /* Spasi antar huruf */
        animation: ketik 4s steps(50, end);
    }


    /* Animasi ketik */
    @keyframes ketik {
        0% {
            width: 0;
        }

        100% {
            width: 100%;
        }
    }
</style>
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative">
        <h1 class="teksjalan" style="color:ghostwhite">Selamat Datang </h1>
        <h2>
            Sitoluama adalah salah satu Desa di Kecamatan Laguboti, Kabupaten Toba,<br> Provinsi Sumatra Utara,
            Indonesia.
        </h2>
        <a href="{{ route('tentangdesa.user') }}" class="btn-get-started">Asa diboto ho</a>
    </div>
</section>
<!-- End Hero -->
