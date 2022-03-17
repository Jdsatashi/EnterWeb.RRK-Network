@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <div class="card pt-2">
              <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form action="{{ __('/post') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @if(session('errors'))
                        @foreach($errors as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        @endif
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <div class="row mb-3">
                                    <label for="author" class="col-md-4 col-form-label">{{ __('Author name') }}</label>

                                    <select id="author" name="author" class="form-select" aria-label="Default select example">
                                        <option value="{{ __('anonymous') }}">
                                            Anonymous
                                        </option>
                                            <option value="{{ Auth::user()->username }}">
                                                {{ Auth::user()->username }}
                                            </option>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-6">
                                <div class="row mb-3">
                                    <label for="author" class="col-md-4 col-form-label">{{ __('Category') }}</label>

                                    <select id="category_id" name="category_id" class="form-select" aria-label="Default select example">
                                        <option selected>Select toptic catagories</option>

                                        @foreach(\App\Models\Category::all() as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->catename }} + {{ $category->id }}
                                            </option>

                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>


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
            <button type="submit" class="btn btn-primary">Post</button>
        </div>
    </div>
    </form>
</div>
           </div>
        </div>
    </div>
</div>
@endsection





