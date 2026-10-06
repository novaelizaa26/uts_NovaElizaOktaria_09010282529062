<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::with('category')
            ->when($request->search, function ($q, $s) {
                $q->where(function ($q) use ($s) {
                    $q->where('title', 'like', "%$s%")
                    ->orWhere('author', 'like', "%$s%");
                });
            })
            ->when($request->category_id, fn ($q, $c) => $q->where('category_id', $c))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('books.index', [
            'books' => $books,
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        return view('books.create', ['categories' => Category::all()]);
    }   

    public function store(Request $request)
    {
        Book::create($this->validated($request));
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', [
            'book' => $book,
            'categories' => Category::all(),
        ]);
    }

    public function update(Request $request, Book $book)
    {
        $book->update($this->validated($request));
        return redirect()->route('books.index')->with('success', 'Buku berhasil diubah');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year' => 'required|digits:4|integer',
            'stock' => 'required|integer|min:0',
        ]);
    }
}
