@extends('front.user_master')
@section('user_content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('home.user') }}">Home</a></li>
                    <li>Berita</li>
                </ol>
                <h2>Detail Berita</h2>
            </div>
        </section>

        </div><!-- End Breadcrumbs -->
        <section id="blog" class="blog">
            <div class="container aos-init aos-animate" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-8 entries">
                        @foreach ($berita as $item)
                            <article class="entry entry-single">

                                <div class="entry-img">
                                    <img src="{{ asset($item->berita_image) }}" alt="" class="img-fluid">
                                </div>

                                <h2 class="entry-title">
                                    <a href="blog-single.html">{{ $item->berita_title }}</a>
                                </h2>

                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time
                                                datetime="2020-01-01">{{ $item->created_at->diffForHumans() }}</time>
                                        </li>&ensp;
                                        <i class="bi bi-tags"></i>
                                        <ul class="tags">
                                            <li><a
                                                    href="{{ route('all.category', $item['category']['id']) }}">{{ $item['category']['berita_category'] }}</a>
                                            </li>
                                        </ul>

                                    </ul>
                                </div>

                                <div class="entry-content">
                                    <p>
                                        {!! substr($item->berita_description, 0, strlen($item->berita_description) / 2) !!}
                                    </p>

                                    <blockquote>
                                        <p>
                                            Di aha tuhan dosantaon ibana huta martahanon, namoror pe huta tahi bege molo
                                            taruli, pe imbar ma taruli, diboto do aha tuhan, rap hita ida tu di au huta.
                                        </p>
                                    </blockquote>

                                    <p>
                                        {!! substr($item->berita_description, strlen($item->berita_description) / 2) !!}
                                    </p>



                                </div>


                            </article><!-- End blog entry -->
                        @endforeach



                    </div><!-- End blog entries list -->

                    <div class="col-lg-4">

                        <div class="sidebar">

                            <h3 class="sidebar-title">Search</h3>
                            <div class="sidebar-item search-form">
                                <form action="{{ route('search.berita') }}" method="GET">
                                    <input type="text" name="search" placeholder="Cari Berita">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div><!-- End sidebar search formn-->

                            <h3 class="sidebar-title">Categories</h3>
                            <div class="sidebar-item categories">
                                <ul>
                                    @foreach ($category as $item)
                                        <?php
                                        $count = DB::table('beritas')
                                            ->where('berita_category_id', $item->id)
                                            ->count();
                                        ?>
                                        <li>
                                            <a href="{{ route('all.category', $item->id) }}">
                                                {{ $item->berita_category }}
                                                <span>({{ $count }})</span>
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div><!-- End sidebar categories-->

                            <h3 class="sidebar-title">Recent Posts</h3>
                            @foreach ($beritarecent as $item)
                                <div class="sidebar-item recent-posts">
                                    <div class="post-item clearfix">
                                        <img src="{{ asset($item->berita_image) }}" alt="   ">
                                        <h4><a
                                                href="{{ route('single.berita', $item->id) }}">{{ $item->berita_title }}</a>
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
