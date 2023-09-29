<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        
        $data = $request->validate([
            'fish' => 'required|string|min:3|max:50',
            'desc' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'telefon' => 'nullable|string',
            'email' => 'nullable|string|email',
            'univer_employee' => 'nullable',
            'status' => 'nullable',
        ], [
            'fish.required' => 'Iltimos, "F.i.SH" maydonini to\'ldiring.',
            'fish.string' => 'Iltimos, "F.i.SH" maydonini matn formatida kiriting.',
            'fish.min' => 'Iltimos, "F.i.SH" maydonida to\'liq ism sharif yozing.',
            'fish.max' => 'Iltimos, "F.i.SH" maydonida ko\'p belgi qatnashdi, uni qisqartiring!. (max-50)',

            'desc.string' => 'Iltimos, "Muallif haqida" maydonini matn formatida yozing.',

            'email.string' => 'Iltimos, "Email" maydonini matn formatida yozing.',
            'email.email' => 'Iltimos, "Email" maydonini Email ko\'rinishida yozing.',

            'img.image' => "Muallif suratini yuklashingiz kerak!",
            'img.mimes' => "Surat yuklashda faqat (jpeg, png, jpg, gif) lardan foydalaning!",
            'img.max' => "Surat hajmi 2mb dan ko'p bo'lmasligi lozim!",

        ]);
       
        $data['slug'] = Str::slug($data['fish'] . '-' . Carbon::now());  

        if ($request->hasFile('img')) {
            if ($request->file('img')->isValid()) {
                $path = $request->file('img')->store('public/upload/authors'); // Faylni saqlash joyini belgilash    
        
                $url = Storage::url($path);
                $data['img'] = $url;
            }
        }

        try {
            Author::create($data);

            return back()->with('success', 'Ma\'lumotlar muvaffaqiyatli saqlandi.');

        } catch (\Exception $e) {

            return back()->with('error', 'Xatolik yuz berdi: ' . $e->getMessage());
            
        }

        
   
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        //
    }
}
