<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataAuthors = Author::all();
    
        return view('Author.index', compact('dataAuthors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'author_name' => 'required|min:5',
            'pen_name' => 'nullable|min:5',
            'gender' => 'required|in:Male,Female',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required|min:5',
        ], [
            'author_name.required' => 'Nama penulis wajib diisi.',
            'author_name.min' => 'Nama penulis minimal harus memiliki 5 karakter.',
            'pen_name.min' => 'Nama pena minimal harus memiliki 5 karakter.',
            'gender.required' => 'Jenis kelamin wajib diisi.',
            'gender.in' => 'Pilih jenis kelamin yang valid (Laki-laki atau Perempuan).',
            'date_of_birth.required' => 'Tanggal lahir wajib diisi.',
            'date_of_birth.date' => 'Tanggal lahir harus dalam format tanggal yang valid.',
            'place_of_birth.required' => 'Tempat lahir wajib diisi.',
            'place_of_birth.min' => 'Tempat lahir minimal harus memiliki 5 karakter.',
        ]);
    
        $dataAuthor = new Author;
    
        $dataAuthor->author_name = $request->input('author_name');
        $dataAuthor->pen_name = $request->input('pen_name');
        $dataAuthor->gender = $request->input('gender');
        $dataAuthor->date_of_birth = $request->input('date_of_birth');
        $dataAuthor->place_of_birth = $request->input('place_of_birth');
    
        $dataAuthor->save();
    
        return redirect()->route('author.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataAuthor = Author::find($id);
    
        if (!$dataAuthor) {
            return redirect()->route('author.index')->with('error', 'Penulis tidak ditemukan'); // Redirect jika penulis tidak ditemukan
        }
    
        return view('Author.show', compact('dataAuthor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataAuthor = Author::find($id);
    
        if (!$dataAuthor) {
            return redirect()->route('author.index')->with('error', 'Penulis tidak ditemukan'); // Redirect jika penulis tidak ditemukan
        }
    
        return view('Author.edit', compact('dataAuthor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataAuthor = Author::find($id);
     
         if (!$dataAuthor) {
             return redirect()->route('author.index')->with('error', 'Penulis tidak ditemukan'); // Redirect jika penulis tidak ditemukan
         }
     
         $request->validate([
            'author_name' => 'required|min:5',
            'pen_name' => 'nullable|min:5',
            'gender' => 'required|in:Male,Female',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required|min:5',
        ], [
            'author_name.required' => 'Nama penulis wajib diisi.',
            'author_name.min' => 'Nama penulis minimal harus memiliki 5 karakter.',
            'pen_name.min' => 'Nama pena minimal harus memiliki 5 karakter.',
            'gender.required' => 'Jenis kelamin wajib diisi.',
            'gender.in' => 'Pilih jenis kelamin yang valid (Laki-laki atau Perempuan).',
            'date_of_birth.required' => 'Tanggal lahir wajib diisi.',
            'date_of_birth.date' => 'Tanggal lahir harus dalam format tanggal yang valid.',
            'place_of_birth.required' => 'Tempat lahir wajib diisi.',
            'place_of_birth.min' => 'Tempat lahir minimal harus memiliki 5 karakter.',
        ]);
    
        $dataAuthor->author_name = $request->input('author_name');
        $dataAuthor->pen_name = $request->input('pen_name');
        $dataAuthor->gender = $request->input('gender');
        $dataAuthor->date_of_birth = $request->input('date_of_birth');
        $dataAuthor->place_of_birth = $request->input('place_of_birth');
    
        $dataAuthor->save();
     
         return redirect()->route('author.index')->with('pesan', 'Penulis berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataAuthor = Author::find($id);

        if (!$dataAuthor) {
            return redirect()->route('author.index')->with('error', 'Penulis tidak ditemukan'); // Redirect jika penulis tidak ditemukan
        }

        $dataAuthor->delete(); // Menghapus penulis dari database

        return redirect()->route('author.index')->with('pesan', 'Penulis berhasil dihapus');
    }
}
