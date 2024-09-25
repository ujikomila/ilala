@extends('layouts.app')

@section('content')
<div class="container">
    <h1>create </h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
    <label for="kategori_id" class="form-label">Category</label>
    <select name="kategori_id" class="form-control" required>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ isset($user) && $user->kategori_id == $category->id ? 'selected' : '' }}>
                {{ $category->nama }}
            </option>
        @endforeach
    </select>
</div>


        <button type="submit" class="btn btn-primary">Create </button>
    </form>
</div>
@endsection
