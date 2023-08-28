@extends('admin.admin_master')
@section('master')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Jelajah Category Page</h4><br><br>
                            <form action="{{ route('store.layanan.category') }}" method="POST"enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Jelajah Category
                                        Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control"name="layanan_category" type="text"required
                                            id="example-text-input">
                                        @error('layanan_category')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Category
                                        Description</label>
                                    <div class="col-sm-10">
                                        <textarea id="konten" name="jelajah_category_description"required>
                                        </textarea>
                                    </div>
                                </div>




                                <input
                                    type="submit"class="btn btn-info waves-effect waves-light"value="Insert Jelajah Category">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
