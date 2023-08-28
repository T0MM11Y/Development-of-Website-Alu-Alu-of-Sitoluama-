@extends('admin.admin_master')
@section('master')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Tentang Desa</h4>
                            <form action="{{ route('update.tentang.desa') }}" method="POST"enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $tentangdesa->id }}">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Tentang
                                        Desa</label>
                                    <div class="col-sm-10">
                                        <textarea id="konten" name="tentangdesa"required>{!! $tentangdesa->tentangdesa !!}
                                        </textarea>
                                    </div>
                                </div>
                                <input
                                    type="submit"class="btn btn-info waves-effect waves-light"value="Insert tentang desa Data">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
