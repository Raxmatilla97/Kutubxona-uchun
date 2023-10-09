<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\BookCopy;

class BookStudent extends Model
{
    use HasFactory;
    protected $table = 'book_student';

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function bookCopy()
    {
        return $this->belongsTo(BookCopy::class, 'book_copy_id');
    }

}
