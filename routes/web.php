<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
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
    Route::match(['get', 'post'],'/library/resurs-search', [DashboardController::class, 'booksSearch'])->name('dashboard.resurs-search');
    Route::get('/get-authors', [DashboardController::class, 'getAuthors']);
    Route::get('/library/resurs', [DashboardController::class, 'booksList'])->name('dashboard.resurs-list');    
    Route::get('/library', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/library/books', [DashboardController::class, 'libraryBooks'])->name('dashboard.library-books');
    Route::get('/library/articles', [DashboardController::class, 'libraryArticles'])->name('dashboard.library-articles');
    Route::get('/library/books/{category}', [DashboardController::class, 'libraryBooksCategory'])->name('dashboard.library-books-category');
    Route::get('/library/book/{slug}', [DashboardController::class, 'libraryBookDetal'])->name('dashboard.library-book-detal');

    // Route::post('/library/{id}', [DashboardController::class, 'store'])->name('dashboard.library.store');
   


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
