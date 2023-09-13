<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;
use App\Models\BookCategory;

class Book extends Model
{
    use HasFactory;
    use Rateable;
    
  
    public function BookCategory(){
        return $this->belongsTo(BookCategory::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_author');
    }
}
