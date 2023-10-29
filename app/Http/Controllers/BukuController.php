<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Book::all();
    
        return view('Buku.index', compact('buku'))->with('pesan', 'berhasil ditambahkan');
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:12|unique:books',
            'author' => 'required|min:5',
            'description' => 'nullable|min:5',
        ], [
            'title.required' => 'Judul wajib diisi.',
            'title.min' => 'Judul minimal harus memiliki 5 karakter.',
            'title.max' => 'Judul tidak boleh lebih dari 12 karakter.',
            'title.unique' => 'Judul sudah ada dalam database.',
            'author.required' => 'Penulis wajib diisi.',
            'author.min' => 'Penulis minimal harus memiliki 5 karakter.',
            'description.min' => 'Deskripsi minimal harus memiliki 5 karakter.',
        ]);
    
        // Book::create([
        //     'title' => $request->input('title'),
        //     'author' => $request->input('author'),
        //     'description' => $request->input('description'),
        // ]);

        $buku = new Book;

        $buku->title = $request->input('title');
        $buku->author = $request->input('author');
        $buku->description = $request->input('description');
    
        $buku->save();

        return redirect()->route('buku.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buku = Book::find($id);
    
        if (!$buku) {
            return redirect()->route('index')->with('error', 'Buku tidak ditemukan'); // Redirect jika buku tidak ditemukan
        }
    
        return view('Buku.show', compact('buku'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Book::find($id);
    
        if (!$buku) {
            return redirect()->route('index')->with('error', 'Buku tidak ditemukan');
        }
    
        return view('Buku.edit', compact('buku'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $buku = Book::find($id);

        if (!$buku) {
            return redirect()->route('index')->with('error', 'Buku tidak ditemukan');
        }

        $request->validate([
            'title' => 'required|min:5|max:12|unique:books,title,' . $buku->id,
            'author' => 'required|min:5',
            'description' => 'nullable|min:5',
        ], [
            'title.required' => 'Judul wajib diisi.',
            'title.min' => 'Judul minimal harus memiliki 5 karakter.',
            'title.max' => 'Judul tidak boleh lebih dari 12 karakter.',
            'title.unique' => 'Judul sudah ada dalam database.',
            'author.required' => 'Penulis wajib diisi.',
            'author.min' => 'Penulis minimal harus memiliki 5 karakter.',
            'description.min' => 'Deskripsi minimal harus memiliki 5 karakter.',
        ]);

        $buku->title = $request->input('title');
        $buku->author = $request->input('author');
        $buku->description = $request->input('description');

        $buku->save();

        return redirect()->route('buku.index')->with('pesan', 'Buku berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Book::find($id);

    if (!$buku) {
        return redirect()->route('index')->with('error', 'Buku tidak ditemukan');
    }

    $buku->delete();

    return redirect()->route('buku.index')->with('pesan', 'Buku berhasil dihapus');
    }
}
