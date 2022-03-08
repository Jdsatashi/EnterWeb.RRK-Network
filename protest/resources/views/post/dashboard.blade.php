@extends('layouts.app')

@section('content')
<div class="container">

    @foreach($post as $posts)
    <div class="row pt-2">
        <div class="col-md-6 offset-md-3">
            <a href="/post/{{ $posts->id }}">
                <img src="/storage/{{ $posts->image }}" class="w-100">
            </a>
        </div>
    </div>
    <div class="row pt-2">
        <div class="col-md-6 offset-md-3">
            <div class="d-flex">
                <div>
                    <img src="{{ $posts->user->profile->profileImage() }}" alt=""
                         class="rounded-circle" style="max-width: 50px">
                </div>
                <h3 class="text-danger fw-bold ps-2 pt-2">
                        <a href="/profile/{{ $posts->user->id }}">
                            <span class="text-danger">{{ $posts->user->username }}</span>
                        </a>
                </h3>
            </div>
            <div class="fst-italic fs-5">
                <p>{{ $posts->topic }}</p>
            </div>
            <div class="fs-5">
                <p>{{ $posts->content }}</p>
            </div>
            <div class="d-md-flex justify-content-center">
                @if($posts->likeBy(auth()->user()))
                    <form action="{{ route('post.likes', $posts->id) }}" method="post" class="pe-md-2 pb-md-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary">Unlike</button>
                    </form>
                @elseif($posts->dislikeBy(auth()->user()))
                    <form action="{{ route('post.dislikes', $posts->id) }}" method="post" class="pe-md-2 pb-md-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary">Undislike</button>
                    </form>
                @else
                    <form action="{{ route('post.likes', $posts->id) }}" method="post" class="pe-md-2 pb-md-2">
                        @csrf
                        <button type="submit" class="btn btn-primary">Like</button>
                    </form>
                    <form action="{{ route('post.dislikes', $posts->id) }}" method="post" class="pe-md-2 pb-md-2">
                        @csrf
                        <button type="submit" class="btn btn-primary">Dislike</button>
                    </form>
                @endif

                <span class="p-md-2">{{ $posts->likes->count() }} {{ Str::plural('like', $posts
                            -> likes->count()) }}</span>
                    <span class="p-md-2">{{ $posts->dislikes->count() }} {{ Str::plural('dislike', $posts
                            -> dislikes->count()) }}</span>
                <span class="ps-md-3">
                    <a class="btn btn-primary" href="/post/{{ $posts->id }}">Comment</a>
                </span>
            </div>
        </div>
    </div>
    @endforeach

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $post->links() }}
            </div>  
        </div>

</div>

@endsection
