<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\BookCopy;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helper\ImageManager;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;


class BooksController extends Controller
{
    use ImageManager;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::where('book_or_article', 'book')->orderBy('created_at', 'desc')->paginate(25);

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
        $rules = [
            'title' => 'required|string|min:10|max:255', 
            'book_inventar_number' => 'nullable|string',    
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:1048',    
            'nashriyot_nomi' => 'nullable|string',
            'chiqarilgan_yili' => 'nullable|string',
            'isbn_issn' => 'nullable|string',
            'sahifa_soni_va_olcham' => 'nullable|string',
            'nechanchi_nashr' => 'nullable|string',
            'kitobga_javobgar_id' => 'required|exists:users,id',
            'tags' => 'required',
            'classificatsiya' => 'nullable|string',
            'status' => 'nullable|boolean',
            'notes' => 'nullable|string',
            'tafsiya_etiladi' => 'nullable|boolean',
            'book_category_id' => 'required|exists:book_categories,id',
        ];


        // Xatolar uchun xabarlar
        $messages = [
            'title.required' => "Sarlavha maydoni to'ldirilishi kerak.",
            'title.string' => "Sarlavha maydoni matn bo'lishi kerak.",
            'title.min' => "Sarlavha maydonida kamida :min belgi bo'lishi kerak.",
            'title.max' => 'Sarlavha maydonida :max belgidan oshmasligi kerak.',
            'tags.required' => "Kalit so'zlar maydoni to'ldirilishi kerak.",          
            'book_category_id.required' => "Resurs bo'limi tanlanishi kerak.",    
            'book_category_id.exists' => 'Berilgan kitob kategoriya IDsi bizning kitob kategoriyalarimizda mavjud emas. Iltimos, haqiqiy kitob kategoriya IDsini kiriting.',      
            'kitobga_javobgar_id.required' => "Kitobga javobgar kutubxonachi tanlanishi kerak.",
            'kitobga_javobgar_id.exists' => 'Berilgan javobgar IDsi bizning foydalanuvchilarimizda mavjud emas. Iltimos, haqiqiy foydalanuvchi IDsi kiriting.',   
            
            'image.image' => "Faqat rasm fayllarini yuklashingiz mumkin.",
            'image.mimes' => "Faqat JPEG, PNG yoki JPG formatidagi rasmlarni yuklashingiz mumkin.",
            'image.max' => "Rasm fayli 1048 KB dan kichik yoki teng bo'lishi kerak."
                    
        ];

        // Validatsiya qo'llanishlarini tekshirish
        $validator = Validator::make($request->all(), $rules, $messages);

        // Xatolar bo'lsa
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Image upload  
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename_image = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('images', $filename_image, 'public');
            $request->merge(['image' => $filePath]);
        }else{
            $request->merge(['image' => 'not_deletes/book-test.webp']);
        }

 

        $joylagan_auth = Auth::user()->id;
        $slug = Str::slug($rules['title'], '_') . '_' . now()->format('YmdHis');
        $tags = explode(",", $request->input('tags'));        
        $tmp_file = TemporaryFile::where('folder', $request->pdf)->first();

        // Yangi ma'lumotlarni saqlash
        $newData = [
            'title' => $request->input('title'),
            'slug' => $slug,
            'image' => $request->input('image'),
            'pdf' => isset($tmp_file) ? $tmp_file->folder . '/' . $tmp_file->filename . $tmp_file->file ?? null : null,
            'book_inventar_number' => $request->input('book_inventar_number'),
            'book_or_article' => 'book',
            'nashriyot_nomi' => $request->input('nashriyot_nomi'),
            'chiqarilgan_yili' => $request->input('chiqarilgan_yili'),
            'isbn_issn' => $request->input('isbn_issn'),
            'sahifa_soni_va_olcham' => $request->input('sahifa_soni_va_olcham'),
            'nechanchi_nashr' => $request->input('nechanchi_nashr'),
            'kitobga_javobgar_id' => $request->input('kitobga_javobgar_id'),             
            'joylagan_auth' => $joylagan_auth,
            'classificatsiya' => $request->input('classificatsiya'),
            'status' => $request->input('status', false),
            'notes' => $request->input('notes'),
            'tafsiya_etiladi' => $request->input('tafsiya_etiladi', false),
            'korishlar_soni' => $request->input('korishlar_soni'),
            'oqishlar_soni' => $request->input('oqishlar_soni'),
            'book_category_id' => $request->input('book_category_id'),
        ];
        $newData['tags'] = serialize($tags);
        // Ma'lumotlarni saqlash       
        $book = Book::create($newData);
        $book->tag($tags);

        return redirect()->to(route('dashboard.arm-resurslari.edit', $book->slug) . '#cpnfirm-data')->with('success', "Siz yaratgan kitob muvaffaqiyatli kutubxonaga joylandi!");
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
    public function edit(Request $request)
    {
        
        $book = Book::where('slug', $request->route('arm_resurslari'))->first();
        $users = User::all();
        $categores = BookCategory::all();
        // $postTags = implode(', ', $book->tagNames()); 
        $tagsArray = explode(',', $book->tags);
        $book_copy = BookCopy::where('book_id', $book->id)->paginate(15);
        // dd($book->tagNames());
  
        if (!$book) {           
            return abort(404, 'Book not found');
        }
        
        return view('library.dashboard.book-edit', compact('book', 'users', 'categores', 'book_copy'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {      
        $rules = [            
            'title' => 'required|string|min:10|max:255',
            'book_inventar_number' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:1048',    
            'nashriyot_nomi' => 'nullable|string',
            'chiqarilgan_yili' => 'nullable|string',
            'isbn_issn' => 'nullable|string',
            'sahifa_soni_va_olcham' => 'nullable|string',
            'nechanchi_nashr' => 'nullable|string',
            'kitobga_javobgar_id' => 'required|exists:users,id',
            'tags' => 'required',
            'classificatsiya' => 'nullable|string',
            'status' => 'nullable|boolean',
            'notes' => 'nullable|string',
            'tafsiya_etiladi' => 'nullable|boolean',
            'book_category_id' => 'required|exists:book_categories,id',
        ];
       
        $messages = [
            'title.required' => "Sarlavha maydoni to'ldirilishi kerak.",
            'title.string' => "Sarlavha maydoni matn bo'lishi kerak.",
            'title.min' => "Sarlavha maydonida kamida :min belgi bo'lishi kerak.",
            'title.max' => 'Sarlavha maydonida :max belgidan oshmasligi kerak.',
            'tags.required' => "Kalit so'zlar maydoni to'ldirilishi kerak.",          
            'book_category_id.required' => "Resurs bo'limi tanlanishi kerak.",    
            'book_category_id.exists' => 'Berilgan kitob kategoriya IDsi bizning kitob kategoriyalarimizda mavjud emas. Iltimos, haqiqiy kitob kategoriya IDsini kiriting.',      
            'kitobga_javobgar_id.required' => "Kitobga javobgar kutubxonachi tanlanishi kerak.",
            'kitobga_javobgar_id.exists' => 'Berilgan javobgar IDsi bizning foydalanuvchilarimizda mavjud emas. Iltimos, haqiqiy foydalanuvchi IDsi kiriting.', 
            'image.image' => "Faqat rasm fayllarini yuklashingiz mumkin.",
            'image.mimes' => "Faqat JPEG, PNG yoki JPG formatidagi rasmlarni yuklashingiz mumkin.",
            'image.max' => "Rasm fayli 1048 KB dan kichik yoki teng bo'lishi kerak."
                     
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
       
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Bu yerda validatsiya qo'shish kerak hafsizlik uchun. Ammo hozir erinaman!
        $book_edit = Book::findOrFail($request->arm_resurslari);
       
        if($book_edit){
            $book_edit->title = $request->input('title');
            $book_edit->book_inventar_number = $request->input('book_inventar_number');       
            $book_edit->nashriyot_nomi = $request->input('nashriyot_nomi');
            $book_edit->chiqarilgan_yili = $request->input('chiqarilgan_yili');
            $book_edit->isbn_issn = $request->input('isbn_issn');
            $book_edit->sahifa_soni_va_olcham = $request->input('sahifa_soni_va_olcham');
            $book_edit->nechanchi_nashr = $request->input('nechanchi_nashr');
            $book_edit->kitobga_javobgar_id = $request->input('kitobga_javobgar_id');        
            $book_edit->classificatsiya = $request->input('classificatsiya');
            $book_edit->notes = $request->input('notes');
            $book_edit->tafsiya_etiladi = $request->input('tafsiya_etiladi', false);
            $book_edit->book_category_id = $request->input('book_category_id');
            $book_edit->notes = $request->input('notes');
            $book_edit->status = $request->input('status', false); 
            $book_edit->pdf = TemporaryFile::where('folder', $request->pdf)->first();
            $tags = explode(",", $request->input('tags'));  
            $book_edit->tag($tags);
            
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('images', $filename, 'public');
                $book_edit->image = $filePath;
            } else {
                $book_edit->image = $request->input('image_old', $book_edit->image);
            }     
           
            $book_edit->save();
           
            // $book_edit->tag($tags);
            
            return redirect()->back()->with('message', "Siz tahrirlagan ". $book_edit->title ." nomli kitob o'zgartirildi!");
         }else{
            return abort(404);
         }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $book = Book::find($request->book_id);
        if($book) {
            $book->delete();
            return redirect()->route('dashboard.arm-resurslari.index')->with('success', "Kitob muffaqiyatli o'chirildi!");
        } else {
            return redirect()->route('dashboard.arm-resurslari.index')->with('error', 'Kitob topilmadi!');
        } 
    }


    public function fileStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pdf' => 'required|mimes:pdf,doc,docx,zip,rar|max:5048',
        ]);
    
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    
        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $filename = $file->getClientOriginalName();
            $folder = uniqid('el-resurs', true);
            $file->storeAs('public/uploads/' . $folder, $filename);
            TemporaryFile::create([
                'folder' => $folder,
                'file' => $filename
            ]);
    
            return $folder;
        }
    
        return '';
    }
}
