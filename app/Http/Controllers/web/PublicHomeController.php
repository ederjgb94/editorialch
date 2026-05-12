<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Book;

class PublicHomeController extends Controller
{
    public function index()
    {
        $featuredBooks = Book::latest()->take(8)->get();
        return view('public.home', compact('featuredBooks'));
    }
}
