<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Book;
use App\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'books' => Book::count(),
            'roles' => Role::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
