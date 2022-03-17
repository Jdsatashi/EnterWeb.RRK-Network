@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card pt-2">
                        <div class="card-header">{{ __('Update post') }}</div>
                    <div class="pt-2" style="margin-left: auto; margin-right: auto;">
                        <form action="{{ __('/post/delete/') }}{{ $post->id }}" method="post" class="pe-md-2 pb-md-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </form>
                    </div>

                    <div class="card-body">
                        <form action="{{ __('/post/update/') }}{{ $post->id }}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('PUT')
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
                                        <label for="author" class="col-md-4 col-form-label">{{ __('Select Categories') }}</label>

                                        <select id="category_id" name="category_id" class="form-select" aria-label="Default select example">
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
                                               name="content" value="{{ old('content') ?? $post->content }}" required autocomplete="content" autofocus>
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
                                               name="file" file>

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





