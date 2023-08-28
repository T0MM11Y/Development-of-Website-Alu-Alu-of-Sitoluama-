@extends('admin.admin_master')
@section('master')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Galeri Page</h4>
                            <form action="{{ route('update.galeri') }}" method="POST"enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $galeri->id }}">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">galeri Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control"name="galeri_image" type="file" id="image">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>

                                    <div class="col-sm-10">
                                        <img class="rounded avatar-lg" id="showImage"
                                            src="{{ asset($galeri->galeri_image) }}" alt="Card image cap">
                                    </div>
                                </div>
                                <input
                                    type="submit"class="btn btn-info waves-effect waves-light"value="Update galeri Data">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
