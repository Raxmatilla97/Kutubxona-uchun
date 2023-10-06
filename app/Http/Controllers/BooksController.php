<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use App\Helper\ImageManager;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class BooksController extends Controller
{
    use ImageManager;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::where('book_or_article', 'book')->where('status', '1')->paginate(25);

        return view('library.dashboard.books-list', compact(
            'books'           
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $categores = BookCategory::all();
        return view('library.dashboard.book-create', compact('users', 'categores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $book = Book::find($request->book_id);
        if($book) {
            $book->delete();
            return redirect()->route('arm-resurslari.index')->with('success', "Kitob muffaqiyatli o'chirildi!");
        } else {
            return redirect()->route('arm-resurslari.index')->with('error', 'Kitob topilmadi!');
        } 
    }


    public function fileStore(Request $request)
    {     
            $validator = Validator::make($request->all(), [
                'document' => 'required|mimes:png,pdf,doc,docx,zip,rar,jpeg,jpg|max:5048',
            ]);
        
            if ($validator->fails()) {
                if ($request->hasFile('document')) {
                    $file = $request->file('document');
                    $file->storeAs('vaqtincha/tmp', $file->getClientOriginalName());
                    Storage::delete(storage_path('app/vaqtincha/tmp/' . $file->getClientOriginalName()));
                }
        
                throw new ValidationException($validator);
            }
        
            if ($request->hasFile('document')) {
                $file = $request->file('document');
                $filename = $file->getClientOriginalName();
                $folder = uniqid('vaqtincha', true);
                $file->storeAs('vaqtincha/tmp/' . $folder, $filename);
                TemporaryFile::create([
                    'folder' => $folder,
                    'file' => $filename
                ]);
        
                return $folder;
            }
        
            return '';
    
            // if ($request->hasFile('document')) {
            //     $file = $request->file('document');
            //     $filename = $file->getClientOriginalName();            
            //     $folder = uniqid('vaqtincha', true);
            //     $file->storeAs('vaqtincha/tmp/' . $folder, $filename);
            //     TemporaryFile::create([
            //         'folder' => $folder,
            //         'file' => $filename
            //     ]);
               
            //     return $folder;
            // }
            
            // return '';
        
    }
}
