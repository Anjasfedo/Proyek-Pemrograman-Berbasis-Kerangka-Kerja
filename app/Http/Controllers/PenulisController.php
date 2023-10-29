<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Penulis;

class PenulisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penulis = Penulis::all(); // Mengambil semua data penulis
    
        return view('Penulis.index', compact('penulis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Penulis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_penulis' => 'required|min:5',
            'nama_pena' => 'nullable|min:5',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|min:5',
        ], [
            'nama_penulis.required' => 'Nama penulis wajib diisi.',
            'nama_penulis.min' => 'Nama penulis minimal harus memiliki 5 karakter.',
            'nama_pena.min' => 'Nama pena minimal harus memiliki 5 karakter.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi.',
            'jenis_kelamin.in' => 'Pilih jenis kelamin yang valid (Laki-laki atau Perempuan).',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus dalam format tanggal yang valid.',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tempat_lahir.min' => 'Tempat lahir minimal harus memiliki 5 karakter.',
        ]);
    
        $penulis = new Penulis;
    
        $penulis->nama_penulis = $request->input('nama_penulis');
        $penulis->nama_pena = $request->input('nama_pena');
        $penulis->jenis_kelamin = $request->input('jenis_kelamin');
        $penulis->tanggal_lahir = $request->input('tanggal_lahir');
        $penulis->tempat_lahir = $request->input('tempat_lahir');
    
        $penulis->save();
    
        return redirect()->route('penulis.index'); // Redirect ke halaman daftar penulis
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penulis = Penulis::find($id); // Mencari penulis berdasarkan ID
    
        if (!$penulis) {
            return redirect()->route('penulis.index')->with('error', 'Penulis tidak ditemukan'); // Redirect jika penulis tidak ditemukan
        }
    
        return view('Penulis.show', compact('penulis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penulis = Penulis::find($id); // Mencari penulis berdasarkan ID
    
        if (!$penulis) {
            return redirect()->route('penulis.index')->with('error', 'Penulis tidak ditemukan'); // Redirect jika penulis tidak ditemukan
        }
    
        return view('Penulis.edit', compact('penulis'));
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request,string $id)
     {
         $penulis = Penulis::find($id); // Mencari penulis berdasarkan ID
     
         if (!$penulis) {
             return redirect()->route('penulis.index')->with('error', 'Penulis tidak ditemukan'); // Redirect jika penulis tidak ditemukan
         }
     
         $request->validate([
             'nama_penulis' => 'required|min:5',
             'nama_pena' => 'nullable|min:5',
             'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
             'tanggal_lahir' => 'required|date',
             'tempat_lahir' => 'required|min:5',
         ], [
             'nama_penulis.required' => 'Nama penulis wajib diisi.',
             'nama_penulis.min' => 'Nama penulis minimal harus memiliki 5 karakter.',
             'nama_pena.min' => 'Nama pena minimal harus memiliki 5 karakter.',
             'jenis_kelamin.required' => 'Jenis kelamin wajib diisi.',
             'jenis_kelamin.in' => 'Pilih jenis kelamin yang valid (Laki-laki atau Perempuan).',
             'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
             'tanggal_lahir.date' => 'Tanggal lahir harus dalam format tanggal yang valid.',
             'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
             'tempat_lahir.min' => 'Tempat lahir minimal harus memiliki 5 karakter.',
         ]);
     
         $penulis->nama_penulis = $request->input('nama_penulis');
         $penulis->nama_pena = $request->input('nama_pena');
         $penulis->jenis_kelamin = $request->input('jenis_kelamin');
         $penulis->tanggal_lahir = $request->input('tanggal_lahir');
         $penulis->tempat_lahir = $request->input('tempat_lahir');
     
         $penulis->save();
     
         return redirect()->route('penulis.index')->with('pesan', 'Penulis berhasil diperbarui');
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penulis = Penulis::find($id); // Mencari penulis berdasarkan ID

        if (!$penulis) {
            return redirect()->route('penulis.index')->with('error', 'Penulis tidak ditemukan'); // Redirect jika penulis tidak ditemukan
        }

        $penulis->delete(); // Menghapus penulis dari database

        return redirect()->route('penulis.index')->with('pesan', 'Penulis berhasil dihapus');
    }
}
