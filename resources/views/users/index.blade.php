 @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Users/Admin</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary">create</a>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->kategori->nama }}</td>
            <td>
                <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>

    </table>
</div>
@endsection
