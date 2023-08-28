@extends('front.user_master')
@section('user_content')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ route('home.user') }}">Home</a></li>
                <li>Tentang Desa</li>
            </ol>
            <h2>Tentang Desa</h2>
        </div>
    </section>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

    <section id="blog" class="blog">
        <div class="container aos-init aos-animate">

            <div class="row">

                <div class="col-lg-12 entries">


                    <article class="entry">

                        <div class="section__title">
                            <span class="judultntg">Tentang Desa</span>
                        </div>

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="gmap_canvas"><iframe width="100%" height="100%" id="gmap_canvas"
                                            src="https://maps.google.com/maps?q=sitoluama&t=&z=11&ie=UTF8&iwloc=&output=embed"
                                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><br>
                                        <style>
                                            .mapouter {
                                                position: relative;
                                                text-align: right;
                                                height: 100%;
                                                width: 100%;
                                            }
                                        </style>
                                        <style>
                                            .gmap_canvas {
                                                overflow: hidden;
                                                background: none !important;
                                                height: 20em;
                                                width: 100%;
                                            }
                                        </style>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="about__exp">

                            <div class="about__exp__content"><br>
                                <p style="font-style: italic;"><span>Sitoluama</span> Laguboti, Kabupaten
                                    Toba
                                    Samosir <br>
                                    Sumatera Utara,
                                    Indonesia</p>
                            </div>
                        </div>


                        @foreach ($tentangdesa as $item)
                            <div class="entry-content">
                                <p>
                                    {!! $item->tentangdesa !!}
                                </p>

                            </div>
                        @endforeach


                    </article>

                </div><!-- End blog entries list -->
            </div><!-- End sidebar -->
        </div><!-- End blog sidebar -->

        </div>

        </div>
    </section>
@endsection
