<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('books', BookController::class);

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    
    // Team Routes
    Route::get('/team', [TeamsController::class, 'show'])->name('team');
    
    // Book Delete Routes
    Route::get('/books/{book}/delete', [BookController::class, 'confirmDelete'])->name('books.confirm-delete');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

    // Review Routes
    Route::get('books/{book}/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('books/{book}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::resource('reviews', ReviewController::class)->only(['index']);
    Route::resource('reviews', ReviewController::class)->only(['index', 'edit', 'update', 'destroy']);

});