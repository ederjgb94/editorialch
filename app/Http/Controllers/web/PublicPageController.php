<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class PublicPageController extends Controller
{
    public function contact()
    {
        return view('public.contact');
    }

    public function about()
    {
        return view('public.about');
    }
}
