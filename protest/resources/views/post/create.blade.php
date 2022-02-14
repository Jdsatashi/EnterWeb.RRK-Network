@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/post" enctype="multipart/form-data" method="post">
    @csrf
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="row mb-3">
                <label for="topic" class="col-md-4 col-form-label">Post topic</label>

                    <input id="topic" type="text" class="form-control @error('topic') is-invalid @enderror"
                           name="topic" value="{{ old('topic') }}" required autocomplete="topic" autofocus>

                    @error('topic')
                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                    @enderror
            </div>
        </div>
    </div>

        <div class="row justify-content-center">
            <div class="col-8">
                <div class="row mb-3">
                    <label for="content" class="col-md-4 col-form-label">Post content</label>

                    <input id="content" type="text" class="form-control @error('content') is-invalid @enderror"
                           name="content" value="{{ old('content') }}" required autocomplete="content" autofocus>

                    @error('content')
                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-8">
                <div class="row mb-3">
                    <label for="image" class="col-md-4 col-form-label">Post Image</label>

                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                           name="image"image>

                    @error('image')
                    <strong>{{ $errors->first('image') }}</strong>
                    @enderror
                </div>
            </div>
        </div>


    <div class="row justify-content-center pt-3">
        <div class="col-8">
            <button class="btn btn-outline-success">Post</button>
        </div>
    </div>
    </form>
</div>
@endsection





