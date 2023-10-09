<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\Student;
use App\Models\BookStudent;

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
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function bookStudents()
    {
        return $this->hasMany(BookStudent::class, 'book_copy_id');
    }
   
}
