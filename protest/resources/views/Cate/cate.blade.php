@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ __('/category') }}" enctype="multipart/form-data" method="post">
            @csrf

            <div class="row justify-content-center">
                <div class="col-md-6 pt-4">
                    <div class="card">
                        <div class="card-header">{{ __('Create category') }}</div>
                        <div class="card-body">
                        <label for="catename" class="col-md-4 col-form-label">Category topic</label>

                        <input id="catename" type="text" class="form-control @error('catename') is-invalid @enderror"
                               name="catename" value="{{ old('catename') }}" required autocomplete="catename" autofocus>

                        @error('catename')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                        </div>

                        <div class="row mb-0 pb-3">
                            <div class="col-md-4 offset-md-5">
                                <button type="submit" class="btn btn-info">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </form>
    </div>
@endsection





