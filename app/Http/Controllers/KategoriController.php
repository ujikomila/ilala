<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Menampilkan daftar kategori
    public function index()
    {
        $kategori = Kategori::all(); // Ambil semua data kategori
        return view('Kategori.index', compact('kategori'));
    }

    // Menampilkan form tambah kategori
    public function create(Kategori  $kategori)
    {
    
        return view('kategori.create', compact('kategori'));
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        // Membuat kategori
        Kategori::create($validatedData);

        // Redirect ke halaman daftar kategori
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    // Menampilkan detail kategori
    public function show($id)
    {
        $kategori = Kategori::findOrFail($id); // Ambil data kategori berdasarkan id
        return view('kategori.show', compact('kategori'));
    }

    // Menampilkan form edit kategori
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    // Update data kategori
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        // Ambil kategori dan update
        $kategori = Kategori::findOrFail($id);
        $kategori->update($validatedData);

        // Redirect ke halaman daftar kategori
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        // Redirect ke halaman daftar kategori
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
}
}
