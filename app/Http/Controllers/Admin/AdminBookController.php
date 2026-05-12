<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            'authors' => 'nullable|max:255',
            'isbn' => 'required|unique:books|max:20',
            'publication_date' => 'required|date',
            'edition' => 'required|max:50',
            'partner' => 'required|max:255',
            'volume' => 'nullable|integer',
            'pages' => 'nullable|integer',
            'description' => 'nullable|string',
            'cover' => 'nullable|mimes:pdf|max:10240',
            'image' => 'nullable|image|max:2048',
            'pdf_file' => 'nullable|mimes:pdf|max:10240'
        ]);

        $isbn = Str::slug($validated['isbn']);

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->storeAs('portadas', $isbn . '_portada.pdf', 'public');
        }

        if ($request->hasFile('image')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $validated['image'] = $request->file('image')->storeAs('imagenes', $isbn . '.' . $ext, 'public');
        }

        if ($request->hasFile('pdf_file')) {
            $validated['pdf_path'] = $request->file('pdf_file')->storeAs('libros', $isbn . '.pdf', 'public');
        }

        $book = Book::create($validated);
        return redirect()->route('admin.books.show', $book)->with('action', 'created');
    }

    public function show(Book $book)
    {
        return view('admin.books.success', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'authors' => 'nullable|max:255',
            'isbn' => 'required|max:20|unique:books,isbn,' . $book->id,
            'publication_date' => 'required|date',
            'edition' => 'required|max:50',
            'partner' => 'required|max:255',
            'volume' => 'nullable|integer',
            'pages' => 'nullable|integer',
            'description' => 'nullable|string',
            'cover' => 'nullable|mimes:pdf|max:10240',
            'image' => 'nullable|image|max:2048',
            'pdf_file' => 'nullable|mimes:pdf|max:10240'
        ]);

        $isbn = Str::slug($validated['isbn']);

        if ($request->hasFile('cover')) {
            if ($book->cover) {
                Storage::disk('public')->delete($book->cover);
            }
            $validated['cover'] = $request->file('cover')->storeAs('portadas', $isbn . '_portada.pdf', 'public');
        }

        if ($request->hasFile('image')) {
            if ($book->image) {
                Storage::disk('public')->delete($book->image);
            }
            $ext = $request->file('image')->getClientOriginalExtension();
            $validated['image'] = $request->file('image')->storeAs('imagenes', $isbn . '.' . $ext, 'public');
        }

        if ($request->hasFile('pdf_file')) {
            if ($book->pdf_path) {
                Storage::disk('public')->delete($book->pdf_path);
            }
            $validated['pdf_path'] = $request->file('pdf_file')->storeAs('libros', $isbn . '.pdf', 'public');
        }

        $book->update($validated);
        return redirect()->route('admin.books.show', $book)->with('action', 'updated');
    }

    public function destroy(Book $book)
    {
        if ($book->cover) {
            Storage::disk('public')->delete($book->cover);
        }
        if ($book->image) {
            Storage::disk('public')->delete($book->image);
        }
        if ($book->pdf_path) {
            Storage::disk('public')->delete($book->pdf_path);
        }

        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Libro eliminado exitosamente.');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        if (empty($search)) {
            return redirect()->route('admin.books.index');
        }

        $matchingBooks = Book::where('title', 'LIKE', "%{$search}%");
        $otherBooks = Book::where('title', 'NOT LIKE', "%{$search}%");
        $books = $matchingBooks->union($otherBooks)->paginate(10);

        return view('admin.books.index', compact('books', 'search'));
    }
}
