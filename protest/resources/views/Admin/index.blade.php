@extends('layouts.app')
@section('content')
<div class="container-md">
    <div class="col-md-12">
    <h3 class="p-5">This is the Admin page</h3>
        <a href="{{ route('register') }}">
            <button class="btn btn-dark">
            Create account
            </button>
        </a>
    <table id="tabledesign" class="p-md-2">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Role</th>
            <th>Phonenumber</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($user as $users)
                <tr>
                    <td>{{ $users->id }}</td>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->username }}</td>
                    <td>{{ $users->role }}</td>
                    <td>{{ $users->phonenumber }}</td>
                    <td>{{ $users->email }}</td>
                    <td><a href="{{ __('/register/') }}{{ $users->id }}">
                            <button class="btn-info">Edit</button>
                        </a></td>
                    <td>
                        <a>
                            <form action="{{ route('user.delete', $users->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger">Delete</button>
                            </form>
                        </a>
                    </td>
                </tr>

        @endforeach
    </table>

    </div>
</div>
@endsection
