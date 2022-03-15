@extends('layouts.app')
@section('content')
    <div class="container-md">
        <div class="col-md-8 offset-md-2">
            <h3 class="p-3">This is the Category</h3>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="col-2 offset-5 pb-2">
                <a href="{{ route('cate.create') }}">
                    <button class="btn-primary">Create category</button>
                </a>
            </div>
            <table id="tabledesign" class="p-md-2">
                <tr>
                    <th>ID</th>
                    <th>Category name</th>
                    <th>Create post</th>
                    <th>Delete</th>
                </tr>
                @foreach($category as $categories)
                    <tr>
                        <td>{{ $categories->id }}</td>
                        <td>{{ $categories->catename }}</td>
                        <td><a href="{{ route('create', $categories->id) }}">
                                Create post
                            </a></td>
                        <td>
                            <form action="{{ route('cate.deleted', $categories->id) }}" method="post" class="pe-md-2 pb-md-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>
    </div>
@endsection
