<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BookAuthor;
use Illuminate\Support\Facades\DB;

class BookAuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $bookIds = DB::table('books')->pluck('id');
        $authorIds = DB::table('authors')->pluck('id');
        
        foreach ($bookIds as $bookId) {
            $authorId = $authorIds->random();
        
            BookAuthor::create([
                'book_id' => $bookId,
                'author_id' => $authorId,
            ]);
        }
    }
}
