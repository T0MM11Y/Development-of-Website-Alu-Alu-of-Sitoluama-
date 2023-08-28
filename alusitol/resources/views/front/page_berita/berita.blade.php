@extends('front.user_master')
@section('user_content')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ route('home.user') }}">Home</a></li>
                <li>Berita</li>
            </ol>
            <h2>Semua Berita</h2>
        </div>
    </section>


    <section id="blog" class="blog" data-aos="fade-up">
        <div class="container aos-init aos-animate" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

                    @foreach ($berita as $item)
                        <article id="berita-{{ $loop->index }}" class="entry">

                            <div class="entry-img">
                                <img src="{{ asset($item->berita_image) }}" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="{{ route('single.berita', $item->id) }}">{{ $item->berita_title }}</a>
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
                                    {!! Str::limit($item->berita_description, 400) !!}
                                </p>
                                <div class="read-more">
                                    <a href="{{ route('single.berita', $item->id) }}">Read More</a>
                                </div>
                            </div>

                        </article>
                    @endforeach

                    <!-- End blog entry -->
                    <script>
                        const articles = document.querySelectorAll('[id^="berita-"]');

                        articles.forEach((article, index) => {
                            article.style.opacity = '0';
                            article.style.transform = 'translateY(90px)';
                            article.style.transition =
                                `opacity 2s ease-in-out ${index * 2}s, transform 2s ease-in-out ${index * 0.5}s`;

                            setTimeout(() => {
                                article.style.opacity = '1';
                                article.style.transform = 'translateY(0)';
                            }, 200);
                        });
                    </script>



                    <div class="blog-pagination">
                        <ul class="justify-content-center">
                            {{ $berita->onEachSide(1)->links('pagination::bootstrap-5') }}
                        </ul>
                    </div>

                    <style>
                        .blog-pagination .page-item .page-link {
                            color: lightslategray;
                            background-color: white;
                            border-color: #28a745;
                        }

                        .blog-pagination .page-item .page-link:hover,
                        .blog-pagination .page-item .page-link:focus {
                            background-color: #218838;
                            border-color: #1e7e34;
                        }
                    </style>

                </div><!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">Search Berita</h3>
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
                                    <h4><a href="{{ route('single.berita', $item->id) }}">{{ $item->berita_title }}</a>
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
