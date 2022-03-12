@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ __('/category') }}" enctype="multipart/form-data" method="post">
            @csrf

            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="row mb-3">
                        <label for="catename" class="col-md-4 col-form-label">Category topic</label>

                        <input id="catename" type="text" class="form-control @error('catename') is-invalid @enderror"
                               name="catename" value="{{ old('catename') }}" required autocomplete="catename" autofocus>

                        @error('catename')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
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





