@extends('front.user_master')
@section('user_content')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ route('home.user') }}">Home</a></li>
                <li>Jelajah Desa</li>
            </ol>
            <h2>{{ $categoryname->layanan_category }}</h2>
        </div>
    </section>


    <section id="blog" class="blog">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-8 entries">
                    @foreach ($layananpost as $item)
                        <article class="entry">

                            <div class="entry-img">
                                <img src="{{ asset($item->layanan_image) }}" alt="" class="img-fluid"
                                    width="100%">
                            </div>

                            <h2 class="entry-title">
                                <a href="blog-single.html">{{ $item->layanan_title }}</a>
                            </h2>
                            <div class="entry-meta">

                                <ul class="tags">
                                    <label style="color: tomato"> Terakhir diperbarui pada &nbsp;
                                    </label>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time
                                            datetime="2020-01-01">{{ $item->created_at->diffForHumans() }}</time>
                                    </li>&ensp;
                                    <i class="bi bi-tags"></i>

                                    <li><a
                                            href="{{ route('all.categoryL', $item['category']['id']) }}">{{ $item['category']['layanan_category'] }}</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                    {!! $item->layanan_description !!}
                                </p>
                                <div class="read-more">
                                    <a href="{{ $item->layanan_lokasi }}">Yok Mampir</a>
                                </div>
                            </div>

                        </article><!-- End blog entry -->
                    @endforeach
                    <!-- End blog entry -->



                    <div class="blog-pagination">
                        <ul class="justify-content-center">
                            @if ($layananpost instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
                                {{ $layananpost->onEachSide(1)->links('pagination::bootstrap-5') }}
                            @endif
                        </ul>
                    </div>

                </div><!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">Jelajahi Sitoluama</h3>
                        <div class="sidebar-item search-form">
                            <form action="{{ route('search.layanan') }}" method="GET">
                                <input type="text" name="search" placeholder="Cari Apaa">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!-- End sidebar search formn-->

                        <h3 class="sidebar-title">Categories</h3>
                        <div class="sidebar-item categories">
                            <ul>
                                @foreach ($categoryaa as $item)
                                    <?php
                                    $count = DB::table('layanans')
                                        ->where('layanan_category_id', $item->id)
                                        ->count();
                                    ?>
                                    <li>
                                        <a href="{{ route('all.categoryL', $item->id) }}">
                                            {{ $item->layanan_category }}
                                            <span>({{ $count }})</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div><!-- End sidebar categories-->

                        <h3 class="sidebar-title">Baru diupdate</h3>
                        @foreach ($layananrecent as $item)
                            <div class="sidebar-item recent-posts">
                                <div class="post-item clearfix">
                                    <img src="{{ asset($item->layanan_image) }}" alt="">
                                    <h4> <a href="{{ $item->layanan_lokasi }}">{{ $item->layanan_title }}</a>
                                    </h4>
                                    <time datetime="2020-01-01">{{ $item->created_at->diffForHumans() }}</time>
                                </div>
                            </div><!-- End sidebar recent posts-->
                        @endforeach
                    </div><!-- End sidebar recent posts-->
                </div><!-- End sidebar -->
            </div><!-- End blog sidebar -->
        </div>
        </div>
    </section>
@endsection
