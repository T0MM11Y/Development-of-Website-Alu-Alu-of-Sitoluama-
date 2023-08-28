@extends('admin.admin_master')
@section('master')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Berita Category Page</h4><br><br>
                            <form action="{{ route('update.berita.category', $berita_category->id) }}" method="POST">
                                @csrf

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Berita Category
                                        Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control"name="berita_category" type="text"required
                                            id="example-text-input" value="{{ $berita_category->berita_category }}">
                                        @error('berita_category')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <input
                                    type="submit"class="btn btn-info waves-effect waves-light"value="Updated Berita Category">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
