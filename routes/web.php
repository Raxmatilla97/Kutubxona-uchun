<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LibraryController;
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


Route::middleware('auth')->group(function () {
     // Search qismlari
    Route::match(['get', 'post'],'/library/resurs-search', [LibraryController::class, 'booksSearch'])->name('dashboard.resurs-search');
    Route::get('/get-authors', [LibraryController::class, 'getAuthors']);
    Route::get('/library/resurs', [LibraryController::class, 'booksList'])->name('dashboard.resurs-list');    
    Route::get('/library', [LibraryController::class, 'index'])->name('dashboard.index');
    Route::get('/library/books', [LibraryController::class, 'libraryBooks'])->name('dashboard.library-books');
    Route::get('/library/articles', [LibraryController::class, 'libraryArticles'])->name('dashboard.library-articles');
    Route::get('/library/books/{category}', [LibraryController::class, 'libraryBooksCategory'])->name('dashboard.library-books-category');
    Route::get('/library/book/{slug}', [LibraryController::class, 'libraryBookDetal'])->name('dashboard.library-book-detal');
    Route::get('/library/authors', [LibraryController::class, 'libraryAuthors'])->name('dashboard.library-authors');
    Route::get('/library/author-books/{slug}', [LibraryController::class, 'libraryAuthorBooks'])->name('dashboard.library-author-books');

    // Route::post('/library/{id}', [LibraryController::class, 'store'])->name('dashboard.library.store');
   


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
