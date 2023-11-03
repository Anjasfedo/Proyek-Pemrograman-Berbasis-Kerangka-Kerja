<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    
    protected $table = 'authors';
    protected $fillable = ['author_name', 'pen_name', 'gender', 'date_of_birth', 'place_of_birth'];

    public function books()
    {
        return $this->hasMany(Book::class, 'author_id');
    }
}
