<?php

namespace App\Http\Controllers;

use App\Models\BookCopy;
use Illuminate\Http\Request;

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
        //
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
}
