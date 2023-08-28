<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>Hubungi Kami</h3>
                    <p>
                        Desa Sitoluama <br>
                        Jl. Sitoluama A108 <br>
                        Laguboti, Toba Samosir 535022 <br>
                        Sumatera Utara, Indonesia <br><br>
                        <strong>Telepon:</strong> +62 81396080977<br>
                        <strong>Email:</strong> sitoluama@gmail.com<br>
                    </p>
                </div>


                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Category Berita</h4>
                    <ul>
                        @foreach ($category as $cat)
                            <li><i class="bx bx-chevron-right"></i> <a
                                    href="{{ route('all.category', $cat->id) }}">{{ $cat->berita_category }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Telusuri Tempat</h4>
                    <ul>
                        @foreach ($categoryJ as $cat)
                            <li><i class="bx bx-chevron-right"></i> <a
                                    href="{{ route('all.categoryL', $cat->id) }}">{{ $cat->layanan_category }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <iframe width="100%" height="190em" id="gmap_canvas"
                            src="https://maps.google.com/maps?q=sitoluama&t=&z=9&ie=UTF8&iwloc=&output=embed"></iframe>
                        <br>
                    </div>
                </div>


            </div>
        </div>

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>Sitoluama &nbsp;</span></strong>Hard Work Mauliate
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
                    Designed by <a href="https://www.instagram.com/tiantom15/">T0MM11Y</a>
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://instagram.com/desasitoluama?igshid=NTc4MTIwNjQ2YQ==" class="instagram"><i
                        class="bx bxl-instagram"></i></a>
            </div>
        </div>
</footer>
