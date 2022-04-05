@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 pt-4">
           <div class="card">
              <div class="card-header">{{ __('Post idea') }}</div>
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
                                        @php
                                            $now = Illuminate\Support\Carbon::now()->format('Y-m-d');
                                        @endphp
                                        @foreach(\App\Models\Category::all() as $category)
                                            @if($category->closure_date > $now)
                                            <option value="{{ $category->id }}">
                                            {{ $category->catename }} --- Closure date: {{ $category->closure_date }}
                                            </option>
                                            @endif
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
                        <div class="row justify-content-center pt-3">
                            <div class="col-4 offset-md-2">
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Post
                                    </button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Terms and Conditions</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    1. Your ideas will be publish on this website, everyone can see it.<br>
                                                    2. Your ideas you post will be assets of the system.<br>
                                                    3. Anyone has account can comment and reaction on your post.<br>
                                                    4. Your QA Coordinator would receive a notifition on your post.<br>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-outline-info">Allow and Post</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
    </form>
</div>
           </div>
        </div>
    </div>
</div>
@endsection





