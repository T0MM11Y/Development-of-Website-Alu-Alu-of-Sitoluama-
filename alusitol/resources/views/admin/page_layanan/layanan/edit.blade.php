@extends('admin.admin_master')
@section('master')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Jelajah Page</h4>
                            <form action="{{ route('update.layanan') }}" method="POST"enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $layanan->id }}">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Jelajah Category
                                        Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example"required
                                            name="layanan_category_id">
                                            <option selected="">Open this select menu</option>
                                            @foreach ($category as $cat)
                                                <option value="{{ $cat->id }}"
                                                    {{ $cat->id == $layanan->layanan_category_id ? 'selected' : '' }}>
                                                    {{ $cat->layanan_category }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Jelajah Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control"name="layanan_title" type="text"required
                                            value="{{ $layanan->layanan_title }}" id="example-text-input">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Lokasi</label>
                                    <div class="col-sm-10">
                                        <input class="form-control"name="layanan_lokasi" type="text"
                                            id="example-text-input" value="{{ $layanan->layanan_lokasi }}"required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Jelajah
                                        Description</label>
                                    <div class="col-sm-10">
                                        <textarea id="konten" name="layanan_description" required>
                                        {{ $layanan->layanan_description }}"
                                        </textarea>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">layanan Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control"name="layanan_image" type="file" id="image">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>

                                    <div class="col-sm-10">
                                        <img class="rounded avatar-lg" id="showImage"
                                            src="{{ asset($layanan->layanan_image) }}" alt="Card image cap">
                                    </div>
                                </div>
                                <input
                                    type="submit"class="btn btn-info waves-effect waves-light"value="Update layanan Data">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
