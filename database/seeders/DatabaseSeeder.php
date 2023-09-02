<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Yolg'on ma'lumotlar generatsiyasi uchun
        $this->call(BookCategory::class);
        $this->call(BooksSeeder::class);
        $this->call(StudentsTableSeeder::class)
        
    }
}
