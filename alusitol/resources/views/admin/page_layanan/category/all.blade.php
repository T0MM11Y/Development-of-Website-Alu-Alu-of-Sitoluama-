@extends('admin.admin_master')
@section('master')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Layanan Category All </h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Layanan Category All Data</h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th> Category Name</th>
                                        <th> Category Description</th>
                                        <th style="width: 8em">Action</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($category as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->layanan_category }}</td>

                                            <td>{!! $item->jelajah_category_description !!}</td>

                                            <td>
                                                <a href="{{ route('edit.layanan.category', $item->id) }}"
                                                    class="btn btn-info sm" title="Edit Data"><i
                                                        class="fas fa-edit"></i></a>

                                                <a href="{{ route('delete.layanan.category', $item->id) }}"
                                                    class="btn btn-danger sm" title="Delete Data" id="delete"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

            {{ $category->onEachSide(1)->links('pagination::bootstrap-4') }}


        </div> <!-- container-fluid -->
    </div>
@endsection
