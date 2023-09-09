<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\BookCopy;
use App\Models\Book;
use Faker\Factory;

class BookCopySeeder  extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        // Kitoblar
        $books = Book::all();
        
        // BookCopy obyektlarini yaratish
        foreach ($books as $book) {
            $bookCopiesCount = rand(1, 5); // Har bir kitob uchun 1 dan 5 gacha BookCopy obyektlarini yaratadi
        
            for ($i = 0; $i < $bookCopiesCount; $i++) {
                BookCopy::create([                   
                    'book_id' => $book->id,
                    'inventor_number' => $faker->numerify('INV#####'),
                    'isset_book' => $faker->boolean,
                    'status' => $faker->randomElement(['aktiv', 'korinmas']),
                ]);
            }
        }
    }
}
