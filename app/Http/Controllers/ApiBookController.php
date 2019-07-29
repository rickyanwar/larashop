<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Book;
use App\Http\Resources\Book as BookResource;

use App\Http\Resources\Books as BookResourceCollection;

class ApiBookController extends Controller
{
    public function index(){
        $books = new BookResourceCollection(Book::paginate(10));
        return $books;
    }

    public function view($id)
    {
    // $book = DB::select('select * from books where id = ?', [ $id ]);
    $book = new BookResource(Book::find($id));
    return $book;
    }

    public function top($count)
    {
        $criteria = Book::select('*')
        ->orderBy('views', 'DESC')
        ->limit($count)
        ->get();
        return new BookResourceCollection($criteria);
    }


}
