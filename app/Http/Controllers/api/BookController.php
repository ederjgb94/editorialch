<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Book::query();

        if ($request->has('q')) {
            $search = $request->get('q');
            // Split search terms to allow matching multiple words
            $keywords = explode(' ', $search);

            $query->where(function ($q) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $q->orWhere('title', 'like', "%{$keyword}%")
                        ->orWhere('partner', 'like', "%{$keyword}%");
                }
            });
        }

        return response()->json($query->orderBy('publication_date', 'desc')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $book = Book::create($request->validated());
        return response()->json($book, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return response()->json($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(null, 204);
    }

    /**
     * Search for books and return matching results first, followed by non-matching results
     */
    public function search(Request $request)
    {
        $search = $request->get('title') ?? $request->get('partner') ?? $request->get('publication_date');
        $searchField = null;

        if ($request->has('title')) {
            $searchField = 'title';
        } elseif ($request->has('partner')) {
            $searchField = 'partner';
        } elseif ($request->has('publication_date')) {
            $searchField = 'publication_date';
        }

        if (empty($search)) {
            return response()->json(Book::orderBy('publication_date', 'desc')->paginate(10));
        }

        // Dividimos la búsqueda en palabras clave
        $keywords = explode(' ', $search);

        // Obtenemos los libros que coinciden con alguna de las palabras clave
        $matchingBooks = Book::where(function ($query) use ($searchField, $keywords) {
            foreach ($keywords as $keyword) {
                $query->orWhere($searchField, 'LIKE', "%{$keyword}%");
            }
        });

        // Obtenemos los libros que no coinciden con ninguna de las palabras clave
        $otherBooks = Book::where(function ($query) use ($searchField, $keywords) {
            foreach ($keywords as $keyword) {
                $query->where($searchField, 'NOT LIKE', "%{$keyword}%");
            }
        })->orderBy('publication_date', 'desc');

        // Unimos ambas consultas y paginamos
        $books = $matchingBooks->union($otherBooks)->paginate(10);

        return response()->json($books);
    }
}
