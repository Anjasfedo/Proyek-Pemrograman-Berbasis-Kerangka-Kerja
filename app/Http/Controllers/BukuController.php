<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = [
            ['id' => 1, 'penulis' => 'Penulis 1', 'judul' => 'Judul Buku 1'],
            ['id' => 2, 'penulis' => 'Penulis 2', 'judul' => 'Judul Buku 2'],
            ['id' => 3, 'penulis' => 'Penulis 3', 'judul' => 'Judul Buku 3'],
        ];

        return view('Buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buku = [
            (object) ['id' => 1, 'penulis' => 'Penulis 1', 'judul' => 'Judul Buku 1'],
            (object) ['id' => 2, 'penulis' => 'Penulis 2', 'judul' => 'Judul Buku 2'],
            (object) ['id' => 3, 'penulis' => 'Penulis 3', 'judul' => 'Judul Buku 3'],
        ];
    
        $dataBuku = null;
    
        foreach ($buku as $item) {
            if ($item->id == $id || $item->penulis == $id ||$item->judul == $id) {
                $dataBuku = $item;
                break;
            }
        }

        return view('Buku.detail', compact('dataBuku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
