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

    protected $fillable = [
        'title',
        'slug',
        'book_or_article',
        'image',
        'book_inventar_number',
        'nashriyot_nomi',
        'chiqarilgan_yili',
        'isbn_issn',
        'sahifa_soni_va_olcham',
        'nechanchi_nashr',
        'kitobga_javobgar_id',
        'classificatsiya',
        'status',
        'notes',
        'tafsiya_etiladi',
        'book_category_id',
        'pdf',
        'tags',
        'joylagan_auth',       
        // Boshqa maydonlar
    ];
  
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
