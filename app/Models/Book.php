<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Book extends Model
{
    use HasFactory;
    use Rateable;
    
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function BookCategory(){
        return $this->belongsTo(BookCategory::class);
    }
}
