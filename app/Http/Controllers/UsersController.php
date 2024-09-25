<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kategori;
use Illuminate\Http\Request;

class UsersController extends Controller


{   
    public function index()
    {
        $users = User::with('kategori')->get();
        return view('users.index', compact('users'));
    }

    // Show the form for creating a new user
    public function create()
    {
        $categories = Kategori::all(); // Fetch all categories
        return view('users.create', compact('categories'));
    }

    // Store a newly created user in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('users.index')->with('success', 'berhasil dibuat.');
    }

    // Show the form for editing the specified user
    public function edit(User $user)
    {
        $categories = Kategori::all();
        return view('users.edit', compact('user','categories'));
    }

    // Update the specified user in storage
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        $user->update($request->only(['name', 'email', 'kategori_id']));

        return redirect()->route('users.index')->with('success', 'User berhasil di update.');
    }

    // Remove the specified user from storage
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil di delete.');
}
}
