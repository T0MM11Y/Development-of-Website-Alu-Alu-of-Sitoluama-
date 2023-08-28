@extends('admin.admin_master')
@section('master')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Semua Alu Alu </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Semua alualu</h4>

                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Isi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alualu as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->from }}</td>
                                                <td>{{ $item->to }}</td>
                                                <td>{{ $item->isi }}</td>
                                                <td>
                                                    <a href="{{ route('delete.alualu', $item->id) }}"
                                                        class="btn btn-danger sm" title="Delete Data" id="delete"><i
                                                            class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
            {{ $alualu->onEachSide(1)->links('pagination::bootstrap-4') }}

        </div> <!-- container-fluid -->
    </div>
@endsection
