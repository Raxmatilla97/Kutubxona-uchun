<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Book;
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

        for ($i = 1; $i <= 50; $i++) {
            DB::table('books')->insert([
                'title' => $faker->sentence,
                'slug' => Str::slug($faker->sentence),
                'book_inventar_number' => $faker->randomNumber(6),
                'nashriyot_nomi' => $faker->company,
                'chiqarilgan_yili' => $faker->year,
                'mualif' => $faker->name,
                'isbn_issn' => $faker->isbn13,
                'sahifa_soni_va_olcham' => $faker->randomNumber(2) . ' x ' . $faker->randomNumber(2),
                'nechanchi_nashr' => $faker->randomNumber(2),
                'yozilgan_tili' => $faker->word,
                'kitobga_javobgar' => $faker->name,
                'mavzusi' => $faker->sentence,
                'gmd_name' => $faker->randomElement(['Kitob', 'Elektron kitob']),
                'classificatsiya' => $faker->word,
                'status' => $faker->boolean,
                'uzgaruvchan_soni' => $faker->randomNumber(1),
                'uzgarmas_soni' => $faker->randomNumber(1),
                'notes' => $faker->paragraph,
                'image' => $faker->randomElement(['https://library.cspi.uz/images/site-view-options/comingsoon.jpg', null]),
                'tafsiya_etiladi' => $faker->randomElement(['1', '0']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
