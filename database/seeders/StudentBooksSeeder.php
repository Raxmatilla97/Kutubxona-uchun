<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\BookCopy;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class StudentBooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::pluck('id')->all();
        $books = BookCopy::pluck('id')->all();

        foreach ($students as $studentId) {
            $numBooks = rand(1, 20);
            $randomBookIds = array_rand($books, $numBooks);

            if (!is_array($randomBookIds)) {
                $randomBookIds = [$randomBookIds];
            }

            foreach ($randomBookIds as $randomBookId) {
                DB::table('book_student')->insert([
                    'student_id' => $studentId,
                    'book_copy_id' => $books[$randomBookId],
                    'status' => 1,
                    'kitob_olingan_vaqt' => now(),
                    'kitob_qaytarilgan_vaqt' => null,
                    'kitobning_holati' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
