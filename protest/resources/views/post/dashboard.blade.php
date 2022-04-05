@extends('layouts.app')

@section('content')
<div class="container">
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="row pt-2">
        <div class="col-6 d-flex justify-content-center offset-3">
            <h3>Ideas available: {{ $post->Total() }}</h3>
        </div>
    </div>
    @foreach($post as $posts)

        <div class="col-md-6 offset-md-3 border border-5 pt-2 pb-2">
            <div class="row pt-2">
                <div class="col-md-8 offset-md-2">
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
                            <p class="ps-3">{{ $posts->created_at->diffForHumans() }}</p>
                            {{-- <span>{{ $posts-> created_at }}</span>--}}
                        </div>
                    </div>
                    <div class="fst-italic d-flex">
                        <p>Category: {{ $posts->category->catename }}</p>
                    </div>
                    <div class="fs-5">
                        <p>{{ $posts->content }}</p>
                    </div>
                    <a href="{{ __('/post') }}/{{ $posts->id }}"><button class="btn btn-outline-warning"> Click to view all idea</button></a>
                </div>
            </div>
        </div>
    @endforeach

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="pt-3">
                    {{ $post->links() }}
                </div>
            </div>
        </div>

</div>

@endsection
