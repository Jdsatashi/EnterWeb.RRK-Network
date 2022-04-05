@extends('layouts.app')
@section('content')
    @if(Auth()->user()->role == 4)
    <div class="container-md">
        <div class="col-md-12">
            <h3 class="p-3">This is the Ideas list</h3>
            <p>Click to id to view idea</p>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <table id="tabledesign" class="p-md-2">
                <tr>
                    <th>ID</th>
                    <th>Category name</th>
                    <th>Author</th>
                    <th>Content</th>
                    <th>Document</th>
                    <th>Create at</th>
                    <th>Sum like & dislike</th>
                    <th>Amount comment</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach($post as $posts)
                    <tr>
                        <td><a href="{{ __('/post') }}/{{ $posts->id }}" class="text-decoration-none">{{ $posts->id }}</a></td>
                        <td>{{ $posts->category->catename }}</td>
                        <td>{{ $posts->author }}</td>
                        <td>{{ $posts->content }}</td>
                        <td>{{ $posts->file }}</td>
                        <td>{{ $posts->created_at }}</td>
                        <td>
                            @php
                                $value = $posts->likes->count() + $posts->dislikes->count();
                            @endphp
                            {{ $value }}
                        </td>
                        <td>{{ $posts->comments->count() }}</td>

                        <td><a href="{{ ('/post/edit/') }}{{ $posts->id }}">Edit post</a></td>
                        <td>
                            <form action="{{ route('post.delete', $posts->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="row">
                <div class="col-12 d-flex justify-content-center pt-3">
                    {{ $post->links() }}
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="container-md">
            <div class="col-md-12">
                <h3 class="p-3">This is the Ideas list</h3>
                <p>Click to id to view idea</p>
            @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <table id="tabledesign" class="p-md-2">
                    <tr>
                        <th>ID</th>
                        <th>Category name</th>
                        <th>Author</th>
                        <th>Content</th>
                        <th>Document</th>
                        <th>Create at</th>
                        <th>Sum like & dislike</th>
                        <th>Amount comment</th>
                    </tr>
                    @foreach($post as $posts)
                        <tr>
                            <td><a href="{{ __('/post') }}/{{ $posts->id }}" class="text-decoration-none">{{ $posts->id }}</a></td>
                            <td>{{ $posts->category->catename }}</td>
                            <td>{{ $posts->author }}</td>
                            <td>{{ $posts->content }}</td>
                            <td>{{ $posts->file }}</td>
                            <td>{{ $posts->created_at }}</td>
                            <td>
                                @php
                                    $value = $posts->likes->count() + $posts->dislikes->count();
                                @endphp
                                {{ $value }}
                            </td>
                            <td>{{ $posts->comments->count() }}</td>
                        </tr>
                    @endforeach
                </table>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center pt-3">
                        {{ $post->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
