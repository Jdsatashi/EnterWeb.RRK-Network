@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 pt-4">
                <div class="card">
                    <div class="card-header">{{ __('Edit category') }}</div>
                    <div class="card-body">
                        <form action="{{ __('/category/update/') }}{{ $category->id }}" enctype="multipart/form-data" method="post">
                            @csrf
                        @method('PUT')

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <div class="row mb-3">
                                <label for="catename" class="col-md-4 col-form-label">Category topic</label>

                                <input id="catename" type="text" class="form-control @error('catename') is-invalid @enderror"
                                       name="catename" value="{{ old('catename') ?? $category->catename }}" required autocomplete="catename" autofocus>

                                @error('catename')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                            <div class="row justify-content-center">
                                <div class="col-6">
                                    <div class="row mb-3">
                                        <label for="closure_date" class="col-md-4 col-form-label">Closure date</label>

                                        <input id="closure_date" type="date" class="form-control @error('closure_date') is-invalid @enderror"
                                               name="closure_date" value="{{ old('closure_date') }}" required autocomplete="closure_date" autofocus>

                                        @error('closure_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0 pb-3">
                                <div class="col-md-4 offset-md-5">
                                    <button type="submit" class="btn btn-info">
                                        {{ __('Edit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





