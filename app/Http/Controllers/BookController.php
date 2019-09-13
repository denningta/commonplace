<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Carbon\Carbon;

class BookController extends Controller
{
    public function index() 
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function edit(Book $book) 
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id) 
    {

        $updated_at = Carbon::now();
        $book = Book::find($id);
        Book::where('id', $id)->update($request->except(['_token', '_method']));
        Book::where('id', $id)->update([
            'updated_at' => $updated_at,
        ]);
        $book->save();
        return redirect('books/' . $id);
    }
}
