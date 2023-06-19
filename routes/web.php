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
        return redirect('/');
    })->name('dashboard');

    // Individual book route
    Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

    // Resourceful book routes
    Route::resource('books', BookController::class)->except(['show']);

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // Team Routes
    Route::get('/team', [TeamsController::class, 'show'])->name('team');

    // Book Delete Routes
    Route::get('/books/{book}/delete', [BookController::class, 'confirmDelete'])->name('books.confirm-delete');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy')->middleware('can:delete,book');

    // Review Routes
    Route::get('/books/{book}/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/books/{book}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::patch('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::get('/reviews/{review}/delete', [ReviewController::class, 'confirmDelete'])->name('reviews.confirm-delete');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});