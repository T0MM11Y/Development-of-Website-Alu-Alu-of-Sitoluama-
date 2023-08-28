@extends('admin.admin_master')
@section('master')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Berita Page</h4>
                            <form action="{{ route('store.berita') }}" method="POST"enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Berita Category
                                        Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example"
                                            name="berita_category_id" required>
                                            @foreach ($category as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->berita_category }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Berita Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control"name="berita_title" type="text"required
                                            id="example-text-input">
                                        @error('berita_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Berita
                                        Description</label>
                                    <div class="col-sm-10">
                                        <textarea id="konten" name="berita_description" required>
                                        </textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Berita Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control"name="berita_image" type="file"
                                            id="image"required>
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
                                    type="submit"class="btn btn-info waves-effect waves-light"value="Insert Berita Data">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
