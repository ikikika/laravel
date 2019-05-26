@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create</div>
                <form role="form" method="post" action="{{ route('upload_image') }}" enctype="multipart/form-data">
                <div class="card-body">
                    @include('layouts.session_flash')

                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>File input</label>
                                <input type="file" name="image_file">
                                <p class="help-block">Please upload .jpg and .png files only.</p>
                            </div>
                        </div>



                </div>
                <div class="card-footer">
                            <input type="submit" value="Upload" id="submit-form-btn" name="submit" class="btn btn-primary">
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
