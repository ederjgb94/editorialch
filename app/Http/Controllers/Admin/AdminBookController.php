<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate(10);
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'isbn' => 'required|unique:books|max:20',
            'publication_date' => 'required|date',
            'edition' => 'required|max:50',
            'partner' => 'required|max:255',
            'volume' => 'nullable|integer',
            'pages' => 'nullable|integer',
            'description' => 'nullable|string',
            'cover' => 'nullable|image|max:2048',
            'pdf_file' => 'nullable|mimes:pdf|max:10240'
        ]);

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('covers', 'public');
        }

        if ($request->hasFile('pdf_file')) {
            $isbn = $validated['isbn'];
            $validated['pdf_path'] = $request->file('pdf_file')->storeAs('libros', $isbn . '.pdf', 'public');
        }

        Book::create($validated);
        return redirect()->route('admin.books.index')->with('success', 'Libro creado exitosamente');
    }

    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'isbn' => 'required|max:20|unique:books,isbn,' . $book->id,
            'publication_date' => 'required|date',
            'edition' => 'required|max:50',
            'partner' => 'required|max:255',
            'volume' => 'nullable|integer',
            'pages' => 'nullable|integer',
            'description' => 'nullable|string',
            'cover' => 'nullable|image|max:2048',
            'pdf_file' => 'nullable|mimes:pdf|max:10240'
        ]);

        if ($request->hasFile('cover')) {
            // Eliminar la imagen anterior si existe
            if ($book->cover) {
                Storage::disk('public')->delete($book->cover);
            }
            $validated['cover'] = $request->file('cover')->store('covers', 'public');
        }

        if ($request->hasFile('pdf_file')) {
            // Eliminar el PDF anterior si existe
            if ($book->pdf_path) {
                Storage::disk('public')->delete($book->pdf_path);
            }
            $isbn = $validated['isbn'];
            $validated['pdf_path'] = $request->file('pdf_file')->storeAs('libros', $isbn . '.pdf', 'public');
        }

        $book->update($validated);
        return redirect()->route('admin.books.index')->with('success', 'Libro actualizado exitosamente');
    }

    public function destroy(Book $book)
    {
        // Eliminar archivos asociados
        if ($book->cover) {
            Storage::disk('public')->delete($book->cover);
        }
        if ($book->pdf_path) {
            Storage::disk('public')->delete($book->pdf_path);
        }

        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Libro eliminado exitosamente');
    }
}
