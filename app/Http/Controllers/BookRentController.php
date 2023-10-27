<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookRentController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        return view('book-rent', ['users' => $users, 'books' => $books]);   
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();

        $book = Book::findOrFail($request->book_id)->only('status');

        if($book['status'] != 'in stock'){
            Session::flash('message', 'Cannot rent, The Book is not Available');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-rent');
        }
        else {
            $count = RentLogs::where('user_id', $request->user_id)->where('actual_return_date', null)->count();

            if($count >= 3) {
                Session::flash('message', 'Cannot rent, User has reach Limit of Books');
                Session::flash('alert-class', 'alert-danger');
                return redirect('book-rent');
            }
            else {
                try {
                    DB::beginTransaction();
                    //process insert to rent_logs table
                    RentLogs::create($request->all());
                    //process update book table
                    $book = Book::findOrFail($request->book_id);
                    $book->status = 'not available';
                    $book->save();
                    DB::commit();
    
                    Session::flash('message', 'Rent Book Success');
                    Session::flash('alert-class', 'alert-success');
                    return redirect('book-rent');
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }   
        }
    }

    public function returnBook()
    {
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        return view('return-book', ['users' => $users, 'books' => $books]);
    }

    public function saveReturnBook(Request $request)
    {
        // user & buku yang dipilih untuk return benar, maka berhasil return book
        // user & buku yang dipilih untuk return salah, maka muncul error notice
        $rent = RentLogs::where('user_id', $request->user_id)->where('book_id', $request->book_id)
        ->where('actual_return_date', null);
        $rentData = $rent->first();
        $countData = $rent->count();

        if($countData == 1) {
            // return book (berhasil)
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();

            Session::flash('message', 'Book Return Success');
            Session::flash('alert-class', 'alert-success');
            return redirect('book-return');
        }
        else{
            // erorr notice (gagal)
            Session::flash('message', 'Return Erorr!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-return');
        }
    }
}
