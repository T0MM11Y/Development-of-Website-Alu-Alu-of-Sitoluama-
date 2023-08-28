@extends('admin.admin_master')
@section('master')
    <div class="page-content">

        <?php
        use Carbon\Carbon;
        
        $currentHour = Carbon::now('Asia/Jakarta')->hour;
        
        if ($currentHour >= 5 && $currentHour < 12) {
            $greeting = 'Selamat Pagi';
        } elseif ($currentHour >= 12 && $currentHour < 18) {
            $greeting = 'Selamat Siang';
        } else {
            $greeting = 'Selamat Malam';
        }
        ?>

        <style>
            #cd-timeline-content {
                background-color: white;
                padding: 17px;
                border-radius: 6px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                margin: 20px;
            }
        </style>



        <div class="row">
            <div class="col-xl-12 col-md-12" id="cd-timeline-content">
                <h5>{{ $greeting }} Admin</h5>

                <span>{{ \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->format('l, F j, Y H:i') }}</span>
            </div>

            <div class="col-xl-3 col-md-6">
                <a href="{{ route('all.alualu') }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Alu Alu</p>
                                    <h4 class="mb-2">{{ $countAlualu }}</h4>
                                    <p class="text-muted mb-0">
                                        <span class="text-success fw-bold font-size-12 me-2">
                                            <i class="ri-arrow-right-up-line me-1 align-middle"></i>{{ $alualuhariini }}
                                        </span>
                                        dibuat pada hari ini
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="ri-message-3-line font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card-body -->
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6">
                <a href="{{ route('all.berita') }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-success font-size-14 mb-2">Berita</p>
                                    <h4 class="mb-2">{{ $countberita }}</h4>
                                    <p class="text-muted mb-0">
                                        <span class="text-success fw-bold font-size-12 me-2">
                                            <i class="ri-arrow-right-up-line me-1 align-middle"></i>{{ $beritahariini }}
                                        </span>
                                        dibuat pada hari ini
                                    </p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="ri-article-line font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card-body -->
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6">
                <a href="{{ route('all.galeri') }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-warning font-size-14 mb-2">Galeri</p>
                                    <h4 class="mb-2">{{ $countgaleri }}</h4>
                                    <p class="text-muted mb-0">
                                        <span class="text-warning fw-bold font-size-12 me-2">
                                            <i class="ri-arrow-right-up-line me-1 align-middle"></i>{{ $galerihariini }}
                                        </span>
                                        dibuat pada hari ini
                                    </p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-warning rounded-3">
                                        <i class="mdi mdi-folder-multiple-image font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card-body -->
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6">
                <a href="{{ route('all.layanan') }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-danger font-size-14 mb-2">layanan</p>
                                    <h4 class="mb-2">{{ $countlayanan }}</h4>
                                    <p class="text-muted mb-0">
                                        <span class="text-danger fw-bold font-size-12 me-2">
                                            <i class="ri-arrow-right-up-line me-1 align-middle"></i>{{ $layananhariini }}
                                        </span>
                                        dibuat pada hari ini
                                    </p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-danger rounded-3">
                                        <i class="mdi mdi-folder-multiple-image font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card-body -->
                    </div>
                </a>
            </div>

        </div>
        <div class="col-xl-12">

            <div class="card">
                <div class="card-body pb-0">

                    <h4 class="card-title mb-12">Lokasi Sitoluama</h4>

                    <div class="card-body">
                        <div class="mapouter">
                            <div class="gmap_canvas"><iframe width="100%" height="100%" id="gmap_canvas"
                                    src="https://maps.google.com/maps?q=Sitoluama&t=&z=16&ie=UTF8&iwloc=&output=embed"
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><br>
                                <style>
                                    .mapouter {
                                        position: relative;
                                        text-align: right;
                                        height: 26em;
                                        width: 100%;
                                    }
                                </style>
                                <style>
                                    .gmap_canvas {
                                        overflow: hidden;
                                        background: none !important;
                                        height: 25em;
                                        width: 100%;
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end card -->

        </div>
        <!-- End Page-content -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script>2023 © Upcube.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
@endsection
