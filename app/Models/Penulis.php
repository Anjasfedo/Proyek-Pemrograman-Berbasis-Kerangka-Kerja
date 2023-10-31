<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    use HasFactory;

    protected $table = 'penulis';
    protected $fillable = ['nama_penulis', 'nama_pena', 'jenis_kelamin', 'tanggal_lahir', 'tempat_lahir'];

    public function books()
    {
        return $this->hasMany(Book::class, 'penulis_id');
    }
}
