<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class BookStudent extends Model
{
    use HasFactory;
    protected $table = 'book_student';

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
