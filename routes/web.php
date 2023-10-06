<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthorController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::post('/tmp-upload', [BooksController::class,'fileStore'])->name('fileStore');

Route::middleware('auth')->group(function () {
  
    // Route::post('/library/{id}', [LibraryController::class, 'store'])->name('dashboard.library.store');

    Route::prefix('library')->group(function () {
         // Search qismlari
    Route::get('/', [LibraryController::class, 'index'])->name('dashboard.index');
    Route::match(['get', 'post'],'/library/resurs-search', [LibraryController::class, 'booksSearch'])->name('dashboard.resurs-search');
    Route::get('/get-authors', [LibraryController::class, 'getAuthors']);
    Route::get('/resurs', [LibraryController::class, 'booksList'])->name('dashboard.resurs-list');        
    Route::get('/books', [LibraryController::class, 'libraryBooks'])->name('dashboard.library-books');
    Route::get('/articles', [LibraryController::class, 'libraryArticles'])->name('dashboard.library-articles');
    Route::get('/books/{category}', [LibraryController::class, 'libraryBooksCategory'])->name('dashboard.library-books-category');
    Route::get('/book/{slug}', [LibraryController::class, 'libraryBookDetal'])->name('dashboard.library-book-detal');
    Route::get('/authors', [LibraryController::class, 'libraryAuthors'])->name('dashboard.library-authors');
    Route::post('/author', [AuthorController::class, 'store'])->name('dashboard.library-author-store');
    Route::get('/author-books/{slug}', [LibraryController::class, 'libraryAuthorBooks'])->name('dashboard.library-author-books');


    Route::resource('arm-resurslari', BooksController::class);
    Route::post('arm-resurslari/media', [BooksController::class, 'storeMedia'])->name('dashboard.storeMedia');

    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
