<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;
use App\Models\BookCategory;
use App\Models\User;

class Book extends Model
{
    use HasFactory;
    use Rateable;
    use \Conner\Tagging\Taggable;
  
    public function BookCategory(){
        return $this->belongsTo(BookCategory::class);
    }

    public function users(){
        return $this->belongsTo(User::class, 'kitobga_javobgar_id');
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_author');
    }

    
}
