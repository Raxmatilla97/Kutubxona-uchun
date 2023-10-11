<?php

namespace App\Http\Controllers;

use App\Models\BookCopy;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class BookCopyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book_copy = BookCopy::orderBy('created_at', 'desc')->paginate(25);

        return view('library.dashboard.book-copies-list', compact(
            'book_copy'           
        ));
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
        $rules = [
            'book_id' => 'required|exists:books,id',
            'inventor_number' => 'required|string|min:2|max:25|unique:book_copies',           
            'isset_book' => 'nullable|boolean',
            'status' => 'required|string',
           
        ];

        // Xatolar uchun xabarlar
        $messages = [
            'book_id.required' => 'Kitob IDsi talab qilinadi',
            'book_id.exists' => 'Bunday IDga ega kitob mavjud emas',
        
            'inventor_number.required' => 'Inventar raqami talab qilinadi',
            'inventor_number.string' => 'Inventar raqami satr turi bo\'lishi kerak',
            'inventor_number.min' => 'Inventar raqami kamida 2 belgidan iborat bo\'lishi kerak',
            'inventor_number.max' => 'Inventar raqami ixtimos belgilar soni 25\'dan oshmasligi kerak',
            'inventor_number.unique' => 'Bunday inventar raqami mavjud. Iltimos, boshqa raqam kiriting',
        
            'isset_book.boolean' => 'Kitob Kutubxonada borligi faqat mantiqiy qiymatlar (true yoki false) qabul qiladi',
        
            'status.required' => 'Holat maydoni talab qilinadi',
            'status.string' => 'Holat maydoni satr turi bo\'lishi kerak',  
                    
        ];

        // Validatsiya qo'llanishlarini tekshirish
        $validator = Validator::make($request->all(), $rules, $messages);

        // Xatolar bo'lsa
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } 

        $book = Book::find($request->input('book_id'));

        // Yangi ma'lumotlarni saqlash
        $newData = [
            'book_id' => $request->input('book_id'),
            'inventor_number' => $request->input('inventor_number'),           
            'isset_book' => $request->input('isset_book'),
            'status' => $request->input('status'),
        ];
        
        // Ma'lumotlarni saqlash       
        $book_copy = BookCopy::create($newData);     
    
        // return redirect()->back()->with('copySuccess', "Siz yaratgan kitob nusxasi muvaffaqiyatli yaratildi!");
        return redirect()->back()->with('copySuccess', "Siz yaratgan kitob nusxasi muvaffaqiyatli yaratildi!");
    }

    /**
     * Display the specified resource.
     */
    public function show(BookCopy $bookCopy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookCopy $bookCopy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookCopy $bookCopy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $book_copy = BookCopy::find($request->book_copy_id);
        if($book_copy) {
            $book_copy->delete();
            return redirect()->route('dashboard.kitob-nusxalari.index')->with('success', "Kitob nusxasi muffaqiyatli o'chirildi!");
        } else {
            return redirect()->route('dashboard.kitob-nusxalari.index')->with('error', 'Kitob nusxasi topilmadi!');
        } 
    }

    public function addCopy($request)
    {
        $book_id = $request;       
        // $book_copy = BookCopy::where('book_id', $book_id)->orderBy('created_at', 'desc')->paginate(25);
        $book = Book::find($book_id);
        $book_copy = BookCopy::where('book_id', $book->id)->orderBy('created_at', 'desc')->paginate(25);
        
        return view('library.components.book_copyes_in_book', compact(
            'book_id',
            'book_copy',
            'book'      
        ));
    }
}
