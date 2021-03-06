<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\User;
use App\Author;
use App\AuthorBook;
use Illuminate\Support\Facades\Auth;
use AuthorController;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //return a view listing all the user's books
    public function index()
    {    
        $books = Auth::user()->books;
        return view('index', compact('books'));
    /*compact return an array of the values of the variable $books*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //return a view to add a new book and/or a new author
    public function create()
    {
        $authors = Author::all();
        return view('create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //add a new book and/or a new author
    public function store(Request $request)
    {   
        
        //$book = new Book();
        /*If the validation rules pass, your code will keep executing normally; however, if validation fails, an exception will be thrown and the proper error response will automatically be sent back to the user. In the case of a traditional HTTP request, a redirect response will be generated, while a JSON response will be sent for AJAX requests.*If the validation rules pass, your code will keep executing normally; however, if validation fails, an exception will be thrown and the proper error response will automatically be sent back to the user. In the case of a traditional HTTP request, a redirect response will be generated, while a JSON response will be sent for AJAX requests.*/
        /*this sur l'instance bookcontroller de controller*/
        $data = $this->validate($request, [
            'name'=>'required',
            'user_id'=>'required',
        ]);

        $book = Book::create($data); //remplace $book = new Book(); et $book->saveBook($data);
        $book->authors()->attach($request->author);
        //$book->saveBook($data);
        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */

     //show the view with a specific book information
    public function show($id)
    /*find($id) takes an id and returns a single model. If no matching model exist, it returns null.
    findOrFail($id) takes an id and returns a single model. If no matching model exist, it throws an error. */
    {
        $book = Book::findOrFail($id);
        $authors = $book->authors;
        return view('show', compact('book','authors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //show a view to edit a specifi book
    public function edit($id)
    {
        $authors = Author::all();
        $book = Book::findOrFail($id);
        return view('edit', compact('book'), compact('authors'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //save modification for a specific book
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $data = $this->validate($request, [
            'name'=>'required',
            'user_id'=>'required',
        ]);
    
        $book->update($data); //remplace $book = new Book(); et $book->saveBook($data);
        $book->authors()->detach();
        $book->authors()->attach($request->author);
        //$book->saveBook($data);
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //delete a specific book
    public function destroy($id)
    {

        $book = Book::findOrFail($id);
        $book->authors()->detach();
        $book->delete();

        return redirect()->route('book.index');
    }
}
