<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        foreach (range(1, 30) as $index) {
            DB::table('students')->insert([
                'fish' => $faker->name,
                'img' => $faker->imageUrl(),
                'millati' => $faker->country,
                'student_or_ticher' => $faker->randomElement(['student', 'teacher']),
                'tugulgan_yili' => $faker->year,
                'fakultet' => $faker->word,
                'yonalish' => $faker->word,
                'guruh' => $faker->word,
                'uy_manzili' => $faker->address,
                'telefoni' => $faker->phoneNumber,
                'pass_info' => $faker->sentence,
                'status' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
