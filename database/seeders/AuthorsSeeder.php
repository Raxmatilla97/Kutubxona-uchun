<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Author;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $faker = \Faker\Factory::create();
    
        // Seeding authors
        for ($i = 0; $i < 100; $i++) {
            Author::create([
                'fish' => $faker->name,
                'slug' => Str::slug($faker->name),
                'img' => $faker->imageUrl(),
                'desc' => $faker->paragraph,
                'telefon' => $faker->phoneNumber,
                'email' => $faker->email,
                'univer_employee' => $faker->boolean,
                'status' => $faker->boolean,               
            ]);
        }
    }
}
