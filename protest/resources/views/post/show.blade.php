@extends('layouts.app')
@section('content')
    <div class="container ps-5 pe-5">
        <div class="row g-3 p-5">
            <div class="col-md-4 offset-md-1">
                <div>
                    <div class="d-flex">
                    <div>
                        <img src="{{ asset('img/logo-RRK.png') }}" alt=""
                        class="rounded-circle" style="max-width: 50px">
                    </div>
                        <div class="ps-3 pt-2 fs-5 fw-bold"><a href="">
                                <span class="text-danger"> {{ $post->author }}</span></a>
                        </div>
                    </div>
                    <p class="pt-2 fs-5">{{ $post->content }}</p>
                </div>

                <div class="border border-2 p-3">
                    <h4>Write Comments</h4>
                    <div class="mb-3">
                            <form action="{{ route('comment.store', $post->id) }}" method="post">
                                @csrf
                                <div class="mb-3">

                                    <label for="writer" class="col-md-4 col-form-label">{{ __('Writer name') }}</label>

                                    <select id="writer" name="writer" class="form-select" aria-label="Default select example">
                                        <option selected>Upload as anonymous or your name</option>
                                        <option value="{{ Auth::user()->username }}">
                                            {{ Auth::user()->username }}
                                        </option>
                                        <option value="{{ __('anonymous') }}">
                                            Anonymous
                                        </option>
                                    </select>
                                    <div class="pt-2">
                                    <textarea name="comment" class="form-control" rows="3" autofocus></textarea>
                                    </div>
                                </div>

                                <div class="row justify-content-center pt-1">
                                    <div>
                                        <button type="submit" class="btn btn-primary">Comment</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                <div class="pt-md-2">
                <div class="border border-3 p-md-2">
                    <h4>Comments ({{ $post->comments->count() }})</h4>
                    @foreach($post->comments as $cmt)
                        <div class="border boder-2 p-md-1">
                        <p1 class="text-danger fw-bold"><a href="">{{ $cmt->writer }}</a></p1> <br>
                        <p1>{{ $cmt->comment }}</p1> <br>
                        </div>
                    @endforeach
                </div>
            </div>
            </div>

            <div class="col-md-6 offset-md-1 pt-2 ">
                <img src="/storage/{{ $post->file }}" alt="" class="border border-dark w-100">
                <div class="d-flex justify-content-center pt-md-3">
                    @if($post->likeBy(auth()->user()))
                        <form action="{{ route('post.likes', $post->id) }}" method="post" class="pe-md-2 pb-md-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Unlike</button>
                        </form>
                    @elseif($post->dislikeBy(auth()->user()))
                        <form action="{{ route('post.dislikes', $post->id) }}" method="post" class="pe-md-2 pb-md-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Undislike</button>
                        </form>
                    @else
                        <form action="{{ route('post.likes', $post->id) }}" method="post" class="pe-md-2 pb-md-2">
                            @csrf
                            <button type="submit" class="btn btn-primary">Like</button>
                        </form>
                        <form action="{{ route('post.dislikes', $post->id) }}" method="post" class="pe-md-2 pb-md-2">
                            @csrf
                            <button type="submit" class="btn btn-primary">Dislike</button>
                        </form>
                    @endif

                    <span class="p-md-2">{{ $post->likes->count() }} {{ Str::plural('like', $post
                                -> likes->count()) }}</span>
                    <span class="p-md-2">{{ $post->dislikes->count() }} {{ Str::plural('dislike', $post
                                -> dislikes->count()) }}</span>
                </div>
            </div>
        </div>

    </div>
@endsection
