@extends('layouts.app')
@section('content')
    <div class="container-md">
        <div class="col-md-8 offset-md-2">
            <h3 class="p-3">This is the Category list</h3>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if(Auth()->user()->role == 3)
                <table id="tabledesign" class="p-md-2">
                    <tr>
                        <th>ID</th>
                        <th>Category name</th>
                        <th>Closure date</th>
                    </tr>
                    @foreach($category as $categories)
                        <tr>
                            <td>{{ $categories->id }}</td>
                            <td>{{ $categories->catename }}</td>
                            <td>{{ $categories->closure_date }}</td>
                            </td>
                        </tr>
                    @endforeach
                </table>
                @else
                <div class="col-2 offset-5 pb-2">
                    <a href="{{ route('cate.create') }}">
                        <button class="btn btn-dark">Create category</button>
                    </a>
                </div>
            <table id="tabledesign" class="p-md-2">
                <tr>
                    <th>ID</th>
                    <th>Category name</th>
                    <th>Closure date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach($category as $categories)
                    <tr>
                        <td>{{ $categories->id }}</td>
                        <td>{{ $categories->catename }}</td>
                        <td>{{ $categories->closure_date }}</td>
                        <td><a href="{{ ('/category/edit/') }}{{ $categories->id }}">Edit category</a></td>
                        <td>
                            <form action="{{ route('cate.deleted', $categories->id) }}" method="post" class="pe-md-2 pb-md-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </table>
                @endif
        </div>
    </div>
@endsection
