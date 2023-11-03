<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Author;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataBooks = Book::all();
    
        return view('Book.index', compact('dataBooks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataAuthors = Author::all();
    
        return view('Book.create', compact('dataAuthors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:12|unique:books',
            'author_id' => 'required|exists:authors,id', // Ganti 'penulis_id' menjadi 'author_id'
            'description' => 'nullable|min:5',
        ], [
            'title.required' => 'Judul wajib diisi.',
            'title.min' => 'Judul minimal harus memiliki 5 karakter.',
            'title.max' => 'Judul tidak boleh lebih dari 12 karakter.',
            'title.unique' => 'Judul sudah ada dalam database.',
            'author_id.required' => 'Penulis wajib diisi.',
            'author_id.exists' => 'Penulis tidak valid.',
            'description.min' => 'Deskripsi minimal harus memiliki 5 karakter.',
        ]);
    
        Book::create($request->all());

        return redirect()->route('book.index')->with('pesan', 'Buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataBook = Book::find($id);
        return view('Book.show', compact('dataBook'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataBook = Book::find($id);
        $dataAuthors = Author::all();
    
        return view('Book.edit', compact('dataBook', 'dataAuthors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataBook = Book::find($id);
        $request->validate([
            'title' => 'required|min:5|max:12|unique:books,title,' . $dataBook->id,
            'author_id' => 'required|exists:authors,id', // Ganti 'penulis_id' menjadi 'author_id'
            'description' => 'nullable|min:5',
        ], [
            'title.required' => 'Judul wajib diisi.',
            'title.min' => 'Judul minimal harus memiliki 5 karakter.',
            'title.max' => 'Judul tidak boleh lebih dari 12 karakter.',
            'title.unique' => 'Judul sudah ada dalam database.',
            'author_id.required' => 'Penulis wajib diisi.',
            'author_id.exists' => 'Penulis tidak valid.',
            'description.min' => 'Deskripsi minimal harus memiliki 5 karakter.',
        ]);

        $dataBook->update($request->all());

        return redirect()->route('book.index')->with('pesan', 'Buku berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataBook = Book::find($id);
        $dataBook->delete();

        return redirect()->route('book.index')->with('pesan', 'Buku berhasil dihapus');
    }
}
