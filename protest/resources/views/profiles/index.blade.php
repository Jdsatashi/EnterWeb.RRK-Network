@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-3 p-5">
        <img src="{{ asset('img/logo-RRK-200.png') }}"  alt="" class="rounded-circle">
    </div>
    <div class="col-9 pt-5">
      <div class="d-flex justify-content-between align-items-baseline">
          <h1>{{ $user->username }}</h1>
      </div>
        @can ('update', $user -> profile)
            <a href="/profile/{{ $user->id }}/edit">Edit profile</a>
        @endcan

      <div class="d-flex pt-3">
          <div class="pe-2"><strong>123</strong> posts</div>
          <div class="pe-2"><strong>124</strong> followers</div>
          <div class="pe-2"><strong>125</strong> following</div>
      </div>
      <div class="pt-3"> {{ $user->profile->titles }} </div>
      <div> {{ $user->profile->description }} </div>
    </div>
  </div>

  <div class="row pt-5">
      @foreach($user->posts as $post)
      <div class="col-4 p-3">
          <a href="/post/{{ $post->id }}">
          <img src="/storage/{{ $post->image }}" alt="" class="w-100">
          </a>
      </div>
      @endforeach
  </div>
</div>
@endsection
