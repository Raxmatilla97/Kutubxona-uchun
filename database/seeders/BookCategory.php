<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class BookCategory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'title' => "UO'K: 0 - Umumiy bo'lim",
                'slug' => Str::slug("UO'K: 0 - Umumiy bo'lim")
            ],
            [
                'title' => "UO'K: 1 - Falsafa. Psixologiya",
                'slug' => Str::slug("UO'K: 1 - Falsafa. Psixologiya")
            ],
            [
                'title' => "UO'K: 2 - Din. Ilohiyot",
                'slug' => Str::slug("UO'K: 2 - Din. Ilohiyot")
            ],
            [
                'title' => "UO'K: 3 - Ijtimoiy fanlar",
                'slug' => Str::slug("UO'K: 3 - Ijtimoiy fanlar")
            ],
            [
                'title' => "UO'K: 4 - Siyosat",
                'slug' => Str::slug("UO'K: 4 - Siyosat")
            ],
            [
                'title' => "UO'K: 5 - Matematika. Tabiiy fanlar",
                'slug' => Str::slug("UO'K: 5 - Matematika. Tabiiy fanlar")
            ],
            [
                'title' => "UO'K: 6 - Amaliy fanlar. Meditsina. Texnika",
                'slug' => Str::slug("UO'K: 6 - Amaliy fanlar. Meditsina. Texnika")
            ],
            [
                'title' => "UO'K: 7 - San'at. Musiqa. O'yinlar. Sport",
                'slug' => Str::slug("UO'K: 7 - San'at. Musiqa. O'yinlar. Sport")
            ],
            [
                'title' => "UO'K: 8 - Til. Tilshunoslik. Lingvistika. Adabiyot",
                'slug' => Str::slug("UO'K: 8 - Til. Tilshunoslik. Lingvistika. Adabiyot")
            ],
            [
                'title' => "UO'K: 9 - geografiya. Biografiya. Tarix",
                'slug' => Str::slug("UO'K: 9 - geografiya. Biografiya. Tarix")
            ],
           
        ];

        foreach ($categories as $category) {
            DB::table('book_categories')->insert($category);
        }
    }
}
