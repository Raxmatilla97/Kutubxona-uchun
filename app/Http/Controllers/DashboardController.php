<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use App\Models\Book;
use App\Models\Student;
use App\Models\BookStudent;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
       
        // Asosiy sahifadagi slayd joylashgan shu yerdagi kitoblarni chiqaradi
        $books_defined = Book::where('status', 1)
            ->whereNotNull('image')
            ->where('tafsiya_etiladi', 1)
            ->orderByDesc('created_at')
            ->limit(11)
            ->get();            
        
        // Chap tarafdagi menyudagi kitob bo'limlarini chiqaradi
        $list_category = BookCategory::get();

        // Asosiy sahifadagi kitoblarni ro'yxatini chiqaradi
        $all_books = Book::where('status', 1)
            ->orderByDesc('created_at')            
            ->paginate(16);

        // Asosiy sahifadagi slayd joylashgan shu yerdagi kitoblarni chiqaradi
        $eng_kop_oqilgan_kitob = Book::where('status', 1)
        ->whereNotNull('image')
        ->where('tafsiya_etiladi', 1)
        ->orderByDesc('created_at')
        ->limit(1)
        ->get(); 

        // Asosiy sahifadagi kitobxon talabalar ro'yxatini chiqarish uchun
        $students_kitobxon_count = Student::all();

        foreach ($students_kitobxon_count as $student) {
            $bookCount = BookStudent::where('student_id', $student->id)->count();
            $student->bookCount = $bookCount;

            // Agarda proyekt bitirishida foydalanuvchi img si bo'lmasa default img qo'yishini ko'rsatamiz. != belgisini === ga o'zgartiramiz
            if ($student->img != "") { 
                if ($student->student_or_ticher == 'student') {
                    $student->img = "/assets/images/3432396.png";
                }else{               
                    $student->img = "/assets/images/avatar.png";
                }
            }
           
        }        
       
        $sortedStudents = $students_kitobxon_count->sortByDesc('bookCount')->take(15);

        return view('dashboard-index')->with(
            [   'list_category' => $list_category,
                'books_defined' => $books_defined,
                'all_books' => $all_books,
                'eng_kop_oqilgan_kitob' => $eng_kop_oqilgan_kitob,
                'sortedStudents' => $sortedStudents

            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['rate'] = 4;
        dd($request);
        request()->validate(['rate' => 'required']);

        $post = Post::find($request->id);



        $rating = new \willvincent\Rateable\Rating;

        $rating->rating = $request->rate;

        $rating->user_id = auth()->user()->id;



        $post->ratings()->save($rating);



        return redirect()->route("posts");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
