<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'fish',
        'slug',
        'img',
        'desc',
        'telefon',
        'email',
        'univer_employee',
        'status',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_author');
    }
}
