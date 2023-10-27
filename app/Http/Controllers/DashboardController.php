<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\RentLogs;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bookCount = Book::count();
        $categoryCount = Category::count();
        $userCount = User::count();
        $rentlogs = RentLogs::with(['user', 'book'])->get();
        return view('dashboard', ['book_count' => $bookCount, 'category_coount' => $categoryCount,
         'user_count' => $userCount,'rentlog','rent_logs' => $rentlogs]);  
    }
}
