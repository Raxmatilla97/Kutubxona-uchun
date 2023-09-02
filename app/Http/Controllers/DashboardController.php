<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use App\Models\Book;
use App\Models\Student;
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
           $kitobxon_talabalar = Student::where('status', 1)           
           ->limit(15)
           ->get(); 
  

        return view('dashboard-index')->with(
            [   'list_category' => $list_category,
                'books_defined' => $books_defined,
                'all_books' => $all_books,
                'eng_kop_oqilgan_kitob' => $eng_kop_oqilgan_kitob,
                'kitobxon_talabalar' => $kitobxon_talabalar

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
