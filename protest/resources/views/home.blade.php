@extends('layouts.app')
@section('content')
    <div class="container-md">
        <div class="col-md-4 offset-md-4">
            <h class="fs-1 text-danger">This is the home page</h>
            @php
                $post = App\Models\Post::all();
                $comment = App\Models\Comment::all();
                $cate = App\Models\Category::all();
                $like = App\Models\Like::all();
                $dislike = App\Models\Dislike::all();
                $user1 = App\Models\User::where('department_id', '==', '2');
                $user2 = App\Models\User::where('department_id', '==', '3');
            @endphp
            <div class="row border border-4">
                <div class="col-8 border border-2">
                    <h3>Category available: </h3>
                    <h3>Ideas available: </h3>
                    <h3>Comment available: </h3>
                    <h3>Likes: </h3>
                    <h3>Dislikes: </h3>
                </div>
                <div class="col-4 justify-content-end border border-2">
                    <h3>{{ $cate->count() }}</h3>
                    <h3>{{ $post->count() }}</h3>
                    <h3>{{ $comment->count() }}</h3>
                    <h3>{{ $like->count() }}</h3>
                    <h3>{{ $dislike->count() }}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
