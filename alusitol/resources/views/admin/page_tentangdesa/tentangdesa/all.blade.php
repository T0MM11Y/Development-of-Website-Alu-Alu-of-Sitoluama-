@extends('admin.admin_master')
@section('master')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Semua Tentang Desa </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Semua Tentang Desa</h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Tentang Desa</th>
                                        <th style="width: 9em">Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($tentangdesa as $item)
                                        <tr>
                                            <td>{!! $item->tentangdesa !!}</td>
                                            <td style="width: 5em">
                                                <a href="{{ route('edit.tentang.desa', $item->id) }}"
                                                    class="btn btn-info sm" title="Edit Data"><i
                                                        class="fas fa-edit"></i></a>

                                                <a href="{{ route('delete.tentang.desa', $item->id) }}"
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
            {{ $tentangdesa->onEachSide(1)->links('pagination::bootstrap-4') }}

        </div> <!-- container-fluid -->
    </div>
@endsection
