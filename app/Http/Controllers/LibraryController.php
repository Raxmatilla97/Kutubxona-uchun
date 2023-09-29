<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use App\Models\Book;
use App\Models\Author;
use App\Models\Student;
use App\Models\BookStudent;
use App\Models\BookCopy;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class LibraryController extends Controller
{

    protected $image_book;
    protected $image_article;
    protected $image_teacehr;
    protected $image_student;

    public function __construct()
    {   
        // Kitob va maqolalar uchun default rasmlar
        $this->image_book =  url('/assets/images/book-test.webp');
        $this->image_article = url('/assets/images/book-test3.webp');

        // Talabalar uchun default rasmlar
        $this->image_teacehr =  url('/assets/images/avatar.png');
        $this->image_student = url('/assets/images/1434240.png');

        // Mualliflarni default rasmi uchun
        $this->image_author = url('/assets/images/3432396.png');

    }

    /**
     * Asosiy sahifadagi resurslar uchun yaratilgan funksiya
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
                    $student->img = $this->image_student;
                }else{               
                    $student->img = $this->image_teacehr;
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

    /**
     * SITE_URL/library/resurs dagi resurslarni chaqirish uchun yaratilgan funksiya
     */    
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

    /**
     * Site search qilinganda mualiflarni ism sharifini chiqarish uchun funksiya
     */ 
    public function getAuthors(Request $request)
    {
        // Ma'lumotlar bazasidan avtor nomlarini olish
        $authors = Author::orderBy('fish', 'asc')->pluck('fish');

        // JSON formatida javobni qaytarish
        return response()->json(['authors' => $authors]);
    }

    /**
     * Site search qilish uchun funksiya controlleri
     */ 
    
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
            $query->whereHas('authors', function ($query) use ($author) {
                $query->where('fish', 'like', '%' . $author . '%');
            });
        }

        if ($text) {
            $query->where('title', 'like', '%' . $text . '%');
        }

        $all_books = $query->paginate(28);

        $all_books = $this->imageDeffault($all_books);

        $list_category = BookCategory::get();

        return view('library.books-list', compact('list_category', 'all_books'));
    }

    /**
     * Faqat Kitoblarni ko'rish uchun mo'ljallangan funksiya
     */ 
    public function libraryBooks()
    {
        $list_category = BookCategory::get();
        $all_books = Book::where('book_or_article', 'book')->paginate(28);
        
        $all_books = $this->imageDeffault($all_books);  

        return view('library.books-list', compact('list_category', 'all_books'));
    }

    /**
     * Faqat Maqolalarni ko'rish uchun mo'ljallangan funksiya
     */
    public function libraryArticles()
    {
        $list_category = BookCategory::get();
        $all_books = Book::where('book_or_article', 'article')->paginate(28);
        
        $all_books = $this->imageDeffault($all_books); 

        return view('library.books-list', compact('list_category', 'all_books'));
    }

    /**
     * Kutubxona bo'limlarini chiqaradigan funksiya
     */
    public function libraryBooksCategory($slug)
    {     
        $list_category = BookCategory::get();

        $all_books = Book::where('status', 1)->whereHas('BookCategory', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->paginate(28);

        $all_books = $this->imageDeffault($all_books);

        return view('library.books-list', compact('list_category', 'all_books'));
    }

    /**
     * Resursni sahifasi unda shu resurs haqida ma'lumotlar beriladi
     */
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

        // Kitob nusxalari va ularni olgan o'quvchilar haqida
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
                    'kitob_qaytarilgan_vaqt' => $student_book_copy->kitob_qaytarilgan_vaqt,
                    'kitob_qaytarish_kerak_bolgan_vaqt' => $student_book_copy->kitob_qaytarish_kerak_bolgan_vaqt,
                ]);
            }
        }

        $result_count = $result->count();
        // Collecsiyadagi paginatsiya haqidagi yangi kod
        $page = request('page', 1); // Sahifalar 1 dan boshlanadi
        $perPage = 18; // Paginatsiya qilinadigan itemslar raqami
        $offset = ($page * $perPage) - $perPage;

        $paginatedItems = new LengthAwarePaginator(
            array_slice($result->toArray(), $offset, $perPage, true), 
            count($result),
            $perPage,
            $page, 
            ['path' => request()->url(), 'query' => request()->query()] 
        );
       
        $bookCopies = $paginatedItems;

        // O'xshash resurslarni kodlari
        $keywords = explode(' ', $book->title);

        $oxshashResurslar = Book::where('status', 1)
            ->where(function ($query) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $query->orWhere('title', 'like', '%' . $keyword . '%');
                }
            })
            ->orderBy('title')
            ->limit(11)
            ->get();

            $oxshashResurslar = $this->imageDeffault($oxshashResurslar);  
       
        return view('library.book-detal', compact('list_category', 'book', 'bookCopies', 'result_count', 'oxshashResurslar'));
    }

    /**
     * Barcha funksiyalardagi IMG larni default image ga aylanmtirish funksiyasi
     */
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

    public function libraryAuthors()
    {
        $list_category = BookCategory::get();
        $list_authors = Author::orderBy('created_at', 'desc')->paginate('25');
        
        foreach ($list_authors as $author) {  
            if ($author->img == "") {              
                    $author->img = $this->image_author;             
            }            
        }   

        return view('library.contents.authors-list', compact('list_category', 'list_authors'));
    }
    
    public function libraryAuthorBooks($request)
    {      
        $list_category = BookCategory::get();       
        $author = Author::where('status', '1')->where('slug', $request)->first();
           
        if ($author) {
            $all_books = $author->books()->paginate(15);
        } else {
            $all_books = collect();
        }
        $message_header = "Mualifga tegishli barcha resurslar ro'yxati";
        $all_books = $this->imageDeffault($all_books);

        return view('library.books-list', compact('list_category', 'all_books', 'message_header', 'author'));
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