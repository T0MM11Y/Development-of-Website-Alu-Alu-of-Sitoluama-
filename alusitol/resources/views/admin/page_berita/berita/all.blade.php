@extends('admin.admin_master')
@section('master')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Semua Berita </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Semua Berita</h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th> Title</th>
                                        <th> Image</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($berita as $item)
                                        <tr>
                                            <td>{{ $item['category']['berita_category'] }}</td>
                                            <td>{{ $item->berita_title }}</td>
                                            <td><img src="{{ asset($item->berita_image) }}"
                                                    style="width: 60px; height: 50px;"></td>
                                            <td>
                                                <a href="{{ route('edit.berita', $item->id) }}" class="btn btn-info sm"
                                                    title="Edit Data"><i class="fas fa-edit"></i></a>

                                                <a href="{{ route('delete.berita', $item->id) }}" class="btn btn-danger sm"
                                                    title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
            {{ $berita->onEachSide(1)->links('pagination::bootstrap-4') }}

        </div> <!-- container-fluid -->
    </div>
@endsection
