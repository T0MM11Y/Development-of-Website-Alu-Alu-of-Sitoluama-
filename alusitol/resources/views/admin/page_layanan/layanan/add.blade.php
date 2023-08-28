@extends('admin.admin_master')
@section('master')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Jelajah Page</h4>
                            <form action="{{ route('store.layanan') }}" method="POST"enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Jelajah Category
                                        Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example"
                                            name="layanan_category_id">
                                            @foreach ($category as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->layanan_category }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Jelajah Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control"name="layanan_title" type="text"
                                            id="example-text-input" required>
                                        @error('layanan_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Jelajah
                                        Description</label>
                                    <div class="col-sm-10">
                                        <textarea id="konten" name="layanan_description" required>
                                        </textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Lokasi</label>
                                    <div class="col-sm-10">
                                        <input class="form-control"name="layanan_lokasi" type="text"
                                            id="example-text-input" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Jelajah Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control"name="layanan_image" type="file" id="image"
                                            required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>

                                    <div class="col-sm-10">
                                        <img class="rounded avatar-lg"id="showImage" src="{{ url('upload/no_image.jpg') }}"
                                            alt="Card image cap">
                                    </div>
                                </div>
                                <input
                                    type="submit"class="btn btn-info waves-effect waves-light"value="Insert layanan Data">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
