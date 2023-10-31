<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $fillable = ['title', 'penulis_id', 'description'];

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'penulis_id');
    }
}
