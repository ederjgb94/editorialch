<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;

class BookController extends Controller
{
    /**
     * Catálogo público de libros.
     * Devuelve JSON cuando es una petición AJAX (infinite scroll),
     * o la vista Blade en una petición normal.
     */
    public function index(Request $request)
    {
        $query = Book::query();

        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function ($sub) use ($q) {
                $sub->where('title',   'like', "%{$q}%")
                    ->orWhere('authors', 'like', "%{$q}%")
                    ->orWhere('partner', 'like', "%{$q}%");
            });
        }

        $books = $query->latest()->paginate(12)->withQueryString();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json($books);
        }

        return view('public.books.index', compact('books'));
    }

    /**
     * Vista pública de detalle de libro.
     */
    public function show(Book $book)
    {
        return view('public.books.show', compact('book'));
    }

    // ── Métodos de Admin (usados por la ruta admin.books resource) ──────────

    public function create()
    {
        return view('books.create');
    }

    public function store(StoreBookRequest $request)
    {
        Book::create($request->validated());
        return redirect()->route('admin.books.index')->with('success', 'Libro creado exitosamente');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return redirect()->route('admin.books.index')->with('success', 'Libro actualizado exitosamente');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Libro eliminado exitosamente');
    }
}

