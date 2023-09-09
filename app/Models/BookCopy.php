<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\Student;

class BookCopy extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'book_id',
        'inventor_number',
        'isset_book',
        'status',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
   
}
