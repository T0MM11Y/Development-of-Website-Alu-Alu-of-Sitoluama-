@extends('front.user_master')
@section('user_content')

    <body data-aos-easing="ease-in-out" data-aos-duration="1000" data-aos-delay="0">
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('home.user') }}">Home</a></li>
                    <li>Galeri</li>
                </ol>
                <h2>Galeri</h2>
            </div>
        </section>

        <!-- ======= Events Section ======= -->
        <section id="events" class="events">
            <div class="container" data-aos="fade-up-left">
                <div class="row">
                    @foreach ($galeri as $item)
                        <div id="card-{{ $loop->index }}" class="col-md-3 d-flex align-items-stretch">
                            <div class="card">
                                <div class="card-img">
                                    <a href="{{ asset($item->galeri_image) }}" class="image-link"
                                        data-mfp-src="{{ asset($item->galeri_image) }}">
                                        <img src="{{ asset($item->galeri_image) }}" alt="...">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <script>
                        // Shuffle array function
                        function shuffleArray(array) {
                            for (let i = array.length - 1; i > 0; i--) {
                                const j = Math.floor(Math.random() * (i + 1));
                                [array[i], array[j]] = [array[j], array[i]];
                            }
                            return array;
                        }

                        const cards = Array.from(document.querySelectorAll('[id^="card-"]'));
                        const galleryContainer = document.getElementById('gallery-container');

                        // Shuffle the cards array
                        const shuffledCards = shuffleArray(cards);

                        shuffledCards.forEach((card, index) => {
                            card.style.opacity = '0';
                            card.style.transform = 'translateY(50px)';
                            card.style.transition =
                                `opacity 0.5s ease-in-out ${index * 0.1}s, transform 0.5s ease-in-out ${index * 0.1}s`;

                            setTimeout(() => {
                                card.style.opacity = '1';
                                card.style.transform = 'translateY(0)';
                            }, 100);
                        });

                        // Adjust gallery container height after all animations finish
                        setTimeout(() => {
                            const cardHeight = shuffledCards[0].offsetHeight;
                            const numRows = Math.ceil(shuffledCards.length / 4); // Assuming 4 columns per row

                            galleryContainer.style.height = `${cardHeight * numRows}px`;
                        }, (shuffledCards.length * 0.1 * 2000) + 500); // Wait for all animations to finish plus some additional time
                    </script>



                </div>
                <div class="blog-pagination">
                    <ul class="justify-content-center">
                        {{ $galeri->onEachSide(1)->links('pagination::bootstrap-5') }}
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

            </div>
        </section><!-- End Events Section -->
    @endsection
