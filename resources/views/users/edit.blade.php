@extends('layouts.app')

@section('content')
<div class="container">
    <h1>update </h1>

    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
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


        <button type="submit" class="btn btn-primary">Update </button>
    </form>
</div>
@endsection
