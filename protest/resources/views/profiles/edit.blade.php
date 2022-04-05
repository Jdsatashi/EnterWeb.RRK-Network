@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="/profile/{{ $user->id }}/update" enctype="multipart/form-data" method="post">
            @csrf
            @method('PUT')

            <div class="row justify-content-center">
                <div class="col-8 pt-4">
                    <div class="row mb-3">
                        <label for="titles" class="col-md-4 col-form-label">Title</label>

                        <input id="titles" type="text" class="form-control @error('titles') is-invalid @enderror"
                               name="titles" value="{{ old('titles') ?? $user->profile->titles }}" required autocomplete="titles" autofocus>

                        @error('titles')
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
                        <label for="description" class="col-md-4 col-form-label">Description</label>

                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                               name="description" value="{{ old('description') ?? $user->profile->description }}" required autocomplete="description" autofocus>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row justify-content-center pt-3">
                <div class="col-8">
                    <button class="btn btn-outline-success">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection





