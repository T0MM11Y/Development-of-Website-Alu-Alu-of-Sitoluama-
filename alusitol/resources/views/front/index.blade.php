@extends('front.user_master')
@include('front.partials.banner')
@section('user_content')
    <section id="why-us" class="why-us">

        <div class="container aos-init aos-animate">
            <div class="row">
                <div class="col-lg-3 d-flex align-items-stretch">
                    <div class="content">
                        <h3> Jelajah Desa </h3>
                        <p>
                            Jelajah Desa Apa - Apa aja yang melibatkan tempat yang ada dalam
                            Desa Sitoluama. Hal ini memberikan kesempatan
                            untuk menjelajahi dan mengenal lebih dekat desa.
                        </p>
                        <div class="text-center">
                            <a href="{{ route('layanan.user') }}" class="more-btn">Lebih Banyak <i
                                    class="bx bx-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 d-flex align-items-stretch"data-aos="fade-up">
                    <section id="values" class="values">
                        <div class="container">
                            <div class="row">
                                @foreach ($categoryJJ as $item)
                                    <div class="col-md-4 d-flex align-items-stretch aos-init aos-animate">
                                        <div class="card-body">

                                            <h5 class="card-title"><a
                                                    href="{{ route('all.categoryL', $item->id) }}">{{ $item->layanan_category }}</a>
                                            </h5>
                                            <p class="card-text">{!! $item->jelajah_category_description !!}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </div>
    </section>
    <style>
        @keyframes move-horizontal {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateY(10px);
            }
        }

        .moving-element {
            animation: move-horizontal 2s infinite alternate;
        }
    </style>


    <section class="section gray-bg" id="blog"data-aos="fade-up">
        <div class="container">

            <div class="row">
                @foreach ($berita as $item)
                    <div class="col-lg-4">
                        <div class="blog-grid moving-element">
                            <div class="blog-img">
                                <div class="date">{{ $item->created_at->diffForHumans() }} </div>
                                <a href="{{ route('single.berita', $item->id) }}">
                                    <img src="{{ asset($item->berita_image) }}" title="" alt=""
                                        width="450em">
                                </a>
                            </div>
                            <div class="blog-info">
                                <h5><a href="{{ route('single.berita', $item->id) }}">{{ $item->berita_title }}</a></h5>
                                <p>{!! Str::limit($item->berita_description, 200) !!}</p>
                                <div class="btn-bar">
                                    <a href="{{ route('single.berita', $item->id) }}" class="px-btn-arrow">
                                        <span>Read More</span>
                                        <i class="arrow"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
@endsection
