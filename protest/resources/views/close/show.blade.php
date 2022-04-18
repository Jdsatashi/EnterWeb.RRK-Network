@extends('layouts.app')
@section('content')
    <div class="container-md">
        <div class="col-md-4 offset-md-4">

            @foreach($close as $closes)
             <h1 class="pt-3 text-danger">Closure date</h1>
            <h2 class="pt-2">{{ $closes->closure_date }}</h2>
            <h1 class="pt-3 text-danger">Final closure date</h1>
                <h2 class="pt-2">{{ $closes->final_closure_date }}</h2>
            <button class="btn btn-outline-warning">
                <a href="{{ __('/close/edit/') }}{{ $closes->id }}">
                    Edit closure date
                </a>
            </button>
            @endforeach
        </div>
    </div>
@endsection
