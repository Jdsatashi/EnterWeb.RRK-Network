@extends('layouts.app')
@section('content')
    <div class="container ps-5 pe-5">
        <div class="row g-3 p-5">
            <div class="col-md-4 offset-md-1">
                <div>
                    <div class="d-flex">
                    <div>
                        <img src="{{ $post->user->profile->profileImage() }}" alt=""
                        class="rounded-circle" style="max-width: 50px">
                    </div>
                        <div class="ps-3 pt-2 fs-5 fw-bold"><a href="/profile/{{ $post->user->id }}">
                                <span class="text-danger"> {{ $post->user->username }}</span></a>
                        <a href="" class="ps-3">Follow</a>
                        </div>
                    </div>
                    <h5 class="pt-3 fw-bolder fs-4 fst-italic">Topic: {{ $post->topic }}</h5>
                    <p class="pt-2 fs-5">{{ $post->content }}</p>
                </div>
                <div class="d-flex pb-md-3">
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
                <div class="border border-5 p-3">
                    <h4>Write Comments</h4>
                    <div class="mb-3">
                            <form action="{{ route('comment.store', $post->id) }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="comment" class="form-label">Example textarea</label>
                                    <textarea name="comment" class="form-control" rows="3"></textarea>
                                </div>

                                <div class="row justify-content-center pt-1">
                                    <div>
                                        <button type="submit" class="btn btn-primary">Post</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                <div class="border border-5 p-3">
                    <h4>Comments ({{ $post->comments->count() }})</h4>
                    @foreach($post->comments as $cmt)
                        <p class="text-danger fw-bold">
                            <a href="/profile/{{ $cmt->user->id }}">
                                <span class="text-danger">{{ $cmt->user->username }}</span>
                            </a>
                        </p>
                        <p>{{ $cmt->comment }}</p>
                    @endforeach
                </div>
            </div>

            <div class="col-md-6 offset-md-1 pt-2">
                <img src="/storage/{{ $post->image }}" alt="" class="w-100">
            </div>
        </div>

    </div>
@endsection
