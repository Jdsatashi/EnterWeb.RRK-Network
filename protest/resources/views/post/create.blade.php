@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <div class="card pt-2">
              <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form action="/post" enctype="multipart/form-data" method="post">
                    @csrf

        <div class="row justify-content-center">
            <div class="col-6">
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
                    <div class="col-6">
                         <div class="row mb-3">
            <label for="role" class="col-md-4 col-form-label">{{ __('Role') }}</label>

                <select id="role" name="role" class="form-select" aria-label="Default select example">
                    <option selected>Select toptic catagories</option>
                    <option value="{{ $category->id }}">{{ $category->catename }}</option>
                </select>

                        </div>
                    </div>
              </div>

        <div class="row justify-content-center">
            <div class="col-6">
                <div class="row mb-3">
                    <label for="file" class="col-md-4 col-form-label">Post File</label>

                    <input id="file" type="file" class="form-control @error('file') is-invalid @enderror"
                           name="file"file>

                    @error('file')
                    <strong>{{ $errors->first('file') }}</strong>
                    @enderror
                </div>
            </div>
        </div>


    <div class="row justify-content-center pt-2">
        <div class="col-4 offset-3">
            <button class="btn btn-outline-success">Post</button>
        </div>
    </div>
    </form>
</div>
           </div>
        </div>
    </div>
</div>
@endsection





