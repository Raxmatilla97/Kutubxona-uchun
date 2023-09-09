<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use App\Models\Book;
use App\Models\Student;
use App\Models\BookStudent;
use App\Models\BookCopy;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class DashboardController extends Controller
{

    protected $image_book;
    protected $image_article;

    public function __construct()
    {
        $this->image_book =  url('/assets/images/book-test.webp');
        $this->image_article = url('/assets/images/book-test3.webp');

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {          
        // Asosiy sahifadagi slayd joylashgan shu yerdagi kitoblarni chiqaradi
        $books_defined = Book::where('status', 1)
            // ->whereNotNull('image')
            ->where('tafsiya_etiladi', 1)
            ->where('book_or_article', 'book')
            ->orderByDesc('created_at')
            ->limit(11)
            ->get();            
        
        // Chap tarafdagi menyudagi kitob bo'limlarini chiqaradi
        $list_category = BookCategory::get();

        // Asosiy sahifadagi kitoblarni ro'yxatini chiqaradi
        $all_books = Book::where('status', 1)
            ->where('book_or_article', 'book')
            ->orderByDesc('created_at')            
            ->paginate(16);

        // Asosiy sahifadagi bitta reytingi kotta kitob ! Reyting sozlash kerak
        $eng_kop_oqilgan_kitob = Book::where('status', 1)
            ->where('book_or_article', 'book')
            // ->whereNotNull('image')
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
                    $student->img = $this->image_book;
                }else{               
                    $student->img = $this->image_article;
                }
            }
           
        }        
       
        $sortedStudents = $students_kitobxon_count->sortByDesc('bookCount')->take(25);

        // Asosiy sahifadagi Ko'p o'qilgan kitoblar ro'yxati

        $kitoblar = Book::all();  
        
        foreach ($kitoblar as $kitob) {
            $totalKorishlar = $kitob->korishlar_soni;
            $totalOqishlar = $kitob->oqishlar_soni;
            
            if ($totalKorishlar != 0) {
                $oqishFoizi = round(($totalOqishlar / $totalKorishlar) * 100);
            } else {
                $oqishFoizi = 0;
            }

             // Kitobni surati bo'lmasa unga default surat birlashtiramiz.
             if ($kitob->image == "") { 
                if ($kitob->book_or_article == 'book') {
                    $kitob->image = $this->image_book;
                }else{               
                    $kitob->image = $this->image_article;
                }
            }

            $kitob->oqish_foizi = $oqishFoizi;
            $kitoblar = $kitoblar->sortByDesc('oqish_foizi')->take(6);
           
        }       

       

        return view('dashboard-index')->with(
            [   'list_category' => $list_category,
                'books_defined' => $books_defined,
                'all_books' => $all_books,
                'eng_kop_oqilgan_kitob' => $eng_kop_oqilgan_kitob,
                'sortedStudents' => $sortedStudents,
                'kitoblar' => $kitoblar,

            ]);
    }   
    
    public function booksList()
    {
        // Chap tarafdagi menyudagi kitob bo'limlarini chiqaradi
        $list_category = BookCategory::get();


        // Asosiy sahifadagi kitoblarni ro'yxatini chiqaradi
        $all_books = Book::where('status', 1)           
            ->orderByDesc('created_at')            
            ->paginate(28);

        $all_books = $this->imageDeffault($all_books);
     
        return view('library.books-list', compact('list_category', 'all_books'));
    }

    public function getAuthors(Request $request)
    {
        // Ma'lumotlar bazasidan avtor nomlarini olish
        $authors = Book::orderBy('mualif', 'asc')->pluck('mualif');

        // JSON formatida javobni qaytarish
        return response()->json(['authors' => $authors]);
    }

    public function booksSearch(Request $request)
    {    
       
        $book_or_article = $request->input('book_or_article');
        $category = $request->input('category');
        $year = $request->input('year');
        $author = $request->input('author');
        $text = $request->input('text');

        $query = Book::query();

        
        if ($book_or_article) {
            $query->where('book_or_article', $book_or_article);
        }
        if ($year) {
            $query->where('chiqarilgan_yili', $year);
        }
    
        if ($author) {
            $query->where('mualif', 'like', '%' . $author . '%');          
        }

        if ($text) {
            $query->where('title', 'like', '%' . $text . '%');          
        }

        $all_books = $query->paginate(28);
      
        $all_books = $this->imageDeffault($all_books);
     
        $list_category = BookCategory::get();

        return view('library.books-list', compact('list_category', 'all_books'));
    }

    public function libraryBooks()
    {
        $list_category = BookCategory::get();
        $all_books = Book::where('book_or_article', 'book')->paginate(28);
        
        $all_books = $this->imageDeffault($all_books);  

        return view('library.books-list', compact('list_category', 'all_books'));
    }

    public function libraryArticles()
    {
        $list_category = BookCategory::get();
        $all_books = Book::where('book_or_article', 'article')->paginate(28);
        
        $all_books = $this->imageDeffault($all_books); 

        return view('library.books-list', compact('list_category', 'all_books'));
    }

    public function libraryBooksCategory($slug)
    {     
        $list_category = BookCategory::get();

        $all_books = Book::where('status', 1)->whereHas('BookCategory', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->paginate(28);

        $all_books = $this->imageDeffault($all_books);

        return view('library.books-list', compact('list_category', 'all_books'));
    }

    public function libraryBookDetal($slug)
    {       
        $list_category = BookCategory::get();
        $book = Book::where('slug', $slug)->first();

        // Kitobning surati bo'lmasa, uchun default surat birlashtiramiz.
        if ($book && $book->image == "") { 
            if ($book->book_or_article == 'book') {
                $book->image = $this->image_book;
            } else {               
                $book->image = $this->image_article;
            }
        } 

        // Your existing code...
        $bookCopies = BookCopy::where('book_id', $book->id)->get();
        $result = collect();

        foreach ($bookCopies as $bookCopy) {
            $student_book_copy = BookStudent::where('book_copy_id', $bookCopy->id)->first();

            if ($student_book_copy) {
                $result->push([
                    'book_copy_id' => $bookCopy->id,
                    'student_name' => $student_book_copy->student->fish,
                    'inventor_number' => $bookCopy->inventor_number,
                    'isset_book' => $bookCopy->isset_book,
                    'kitob_olingan_vaqt' => $student_book_copy->kitob_olingan_vaqt,
                ]);
            }
        }
        $result_count = $result->count();
        // New code to paginate the collection...
        $page = request('page', 1); // Get the current page or default to 1
        $perPage = 18; // Number of items per page
        $offset = ($page * $perPage) - $perPage;

        $paginatedItems = new LengthAwarePaginator(
            array_slice($result->toArray(), $offset, $perPage, true), // Only grab the items we need
            count($result), // Total items
            $perPage, // Items per page
            $page, // Current page
            ['path' => request()->url(), 'query' => request()->query()] // Page path and query
        );
       
        $bookCopies = $paginatedItems;
       
        return view('library.book-detal', compact('list_category', 'book', 'bookCopies', 'result_count'));
    }

    private function imageDeffault($all_books)
    {
        
        foreach ($all_books as $book) { 
               
            // Kitobni surati bo'lmasa unga default surat birlashtiramiz.
            if ($book->image == "") { 
                if ($book->book_or_article == 'book') {
                    $book->image = $this->image_book;
                }else{               
                    $book->image = $this->image_article;
                }
            }
            
        }   
        return $all_books;
    }

    

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $request['rate'] = 4;
       
    //     request()->validate(['rate' => 'required']);

    //     $post = Post::find($request->id);



    //     $rating = new \willvincent\Rateable\Rating;

    //     $rating->rating = $request->rate;

    //     $rating->user_id = auth()->user()->id;



    //     $post->ratings()->save($rating);



    //     return redirect()->route("posts");
    // }

    
}