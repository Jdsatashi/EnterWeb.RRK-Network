@extends('layouts.app')
@section('content')
    <div class="container ps-5 pe-5">
        <div class="row p-5">
            <div class="col-5">
                <div>
                    <h2> {{ $post->user->username }}</h2>
                    <h5 class="pt-2">Topic: {{ $post->topic }}</h5>
                    <p class="pt-2">{{ $post->content }}</p>
                </div>
            </div>
            <div class="col-7">
                <img src="/storage/{{ $post->image }}" alt="" class="w-100">
            </div>
            </div>

    </div>
@endsection
