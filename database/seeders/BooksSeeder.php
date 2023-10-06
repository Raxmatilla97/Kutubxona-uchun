<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 200; $i++) {
            DB::table('books')->insert([
                'title' => $faker->sentence,
                'slug' => Str::slug($faker->sentence),
                'book_inventar_number' => $faker->randomNumber(6),
                'book_or_article' => $faker->randomElement(['book', 'article']),
                'nashriyot_nomi' => $faker->company,
                'chiqarilgan_yili' => $faker->year,                
                'isbn_issn' => $faker->isbn13,
                'sahifa_soni_va_olcham' => $faker->randomNumber(2) . ' x ' . $faker->randomNumber(2),
                'nechanchi_nashr' => $faker->randomNumber(2),
                'kitobga_javobgar_id' => '1',  
                // 'gmd_name' => $faker->randomElement(['Kitob', 'Elektron kitob']),
                'classificatsiya' => $faker->word,
                'status' => $faker->boolean,              
                'notes' => $faker->paragraph,
                'image' => null,
                'tafsiya_etiladi' => $faker->randomElement(['1', '0']),
                'korishlar_soni' => $faker->numberBetween(100, 200),
                'oqishlar_soni' => $faker->numberBetween(20, 90),
                'book_category_id' => $faker->numberBetween(1, 8),               
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
