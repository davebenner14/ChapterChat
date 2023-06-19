<?php


namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
public function __construct()
{
$this->middleware('auth');
}

public function index()
{
$books = Book::with('reviews')->get();

// Calculate average rating for each book
foreach ($books as $book) {
$averageRating = $book->reviews->avg('rating');
$book->averageRating = $averageRating;
}

return view('books.index', ['books' => $books]);
}

public function create()
{
return view('books.create');
}

public function store(Request $request)
{
$request->validate([
'title' => 'required',
'author' => 'required',
'genre' => 'required',
'summary' => 'required',
]);

$book = new Book();
$book->title = $request->input('title');
$book->author = $request->input('author');
$book->genre = $request->input('genre');
$book->summary = $request->input('summary');
$book->team_id = Auth::user()->currentTeam->id;
$book->user_id = Auth::id();
$book->save();

return redirect()->route('books.index');
}

public function show(Book $book)
{
// Allow any user to view the book

$book->load('reviews'); // Load the reviews of the book

// Calculate average rating
$averageRating = $book->reviews->avg('rating');

return view('books.show', compact('book', 'averageRating'));
}

public function edit(Book $book)
{
$this->authorize('update', $book);

return view('books.edit', compact('book'));
}

public function update(Request $request, Book $book)
{
$this->authorize('update', $book);

$request->validate([
'title' => 'required',
'author' => 'required',
'genre' => 'required',
'summary' => 'required',
]);

$book->title = $request->input('title');
$book->author = $request->input('author');
$book->genre = $request->input('genre');
$book->summary = $request->input('summary');
$book->save();

return redirect()->route('books.show', $book);
}

public function destroy(Book $book)
{
$this->authorize('delete', $book);

$book->delete();

return redirect()->route('books.index');
}

public function confirmDelete(Book $book)
{
return view('books.delete', compact('book'));
}
}