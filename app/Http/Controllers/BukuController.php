<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Penulis;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Book::all();
    
        return view('Buku.index', compact('buku'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penulis = Penulis::all(); // Mengambil daftar penulis dari model Penulis
    
        return view('Buku.create', compact('penulis'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:12|unique:books',
            'penulis_id' => 'required|exists:penulis,id',
            'description' => 'nullable|min:5',
        ], [
            'title.required' => 'Judul wajib diisi.',
            'title.min' => 'Judul minimal harus memiliki 5 karakter.',
            'title.max' => 'Judul tidak boleh lebih dari 12 karakter.',
            'title.unique' => 'Judul sudah ada dalam database.',
            'penulis_id.required' => 'Penulis wajib diisi.',
            'penulis_id.exists' => 'Penulis tidak valid.',
            'description.min' => 'Deskripsi minimal harus memiliki 5 karakter.',
        ]);
    
        Book::create($request->all());

        return redirect()->route('buku.index')->with('pesan', 'Buku berhasil ditambahkan');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Book $buku)
    {
        return view('Buku.show', compact('buku'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $buku)
    {
        $penulis = Penulis::all(); // Mengambil daftar penulis dari model Penulis
    
        return view('Buku.edit', compact('buku', 'penulis'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $buku)
    {
        $request->validate([
            'title' => 'required|min:5|max:12|unique:books,title,' . $buku->id,
            'penulis_id' => 'required|exists:penulis,id',
            'description' => 'nullable|min:5',
        ], [
            'title.required' => 'Judul wajib diisi.',
            'title.min' => 'Judul minimal harus memiliki 5 karakter.',
            'title.max' => 'Judul tidak boleh lebih dari 12 karakter.',
            'title.unique' => 'Judul sudah ada dalam database.',
            'penulis_id.required' => 'Penulis wajib diisi.',
            'penulis_id.exists' => 'Penulis tidak valid.',
            'description.min' => 'Deskripsi minimal harus memiliki 5 karakter.',
        ]);

        $buku->update($request->all());

        return redirect()->route('buku.index')->with('pesan', 'Buku berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $buku)
    {
        $buku->delete();

        return redirect()->route('buku.index')->with('pesan', 'Buku berhasil dihapus');
    }
}

