@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row pt-2">
            <div class="col-6 d-flex justify-content-center offset-3">
                <h3>Ideas available: {{ $post->count() }}</h3>
            </div>
        </div>
        @foreach($post as $posts)
            <div class="col-md-6 offset-md-3 border border-5">
                <div class="row pt-2">
                    <div class="col-md-6 offset-md-3">
                        <div class="d-flex">
                            <div>
                                <img src="{{ asset('img/logo-RRK.png') }}" alt=""
                                     class="rounded-circle" style="max-width: 50px">
                            </div>
                            <div class="d-flex">
                                <h3 class="text-danger fw-bold ps-2 pt-2">
                                    <a href="">
                                        <span class="text-danger">{{ $posts->author }}</span>
                                    </a>
                                </h3>
                                {{-- <span>{{ $posts-> create_at }}</span>--}}
                            </div>
                        </div>
                        <div class="fst-italic">
                            <p>Category: {{ $posts->category->catename }}</p>
                        </div>
                        <div class="fs-5">
                            <p>{{ $posts->content }}</p>
                        </div>
                        <a href="/post/{{ $posts->id }}"><button class="btn btn-outline-danger"> Click to view all idea</button></a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{-- $post->links() --}}
            </div>
        </div>
    </div>
@endsection
