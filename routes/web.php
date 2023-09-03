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
    Route::get('/get-authors', [DashboardController::class, 'getAuthors']);
    Route::get('/library/resurs', [DashboardController::class, 'booksList'])->name('dashboard.resurs-list');
    // Search qismlari
    Route::post('/library/resurs-search', [DashboardController::class, 'booksSearch'])->name('dashboard.resurs-search');
    Route::get('/library', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::post('/library/{id}', [DashboardController::class, 'store'])->name('dashboard.library.store');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
