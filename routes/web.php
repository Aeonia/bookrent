<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();



//Author
Route::get('/authors', 'AuthorController@index')->name('index');
Route::get('/authors/create', 'AuthorController@create')->name('author.create');
Route::post('/authors/create', 'AuthorController@store')->name('author.store');

//Book
Route::get('/books', 'BookController@index')->middleware('IsUser')->name('book.index');
Route::get('/books/create', 'BookController@create')->name('book.create');
Route::post('/books/create', 'BookController@store')->name('book.store');
Route::get('/books/show/{book}', 'BookController@show')->name('book.show');
Route::get('/books/edit/{book}', 'BookController@edit')->name('book.edit');
Route::put('/books/edit/{book}', 'BookController@update')->name('book.update');
Route::post('/books/edit/{book}/destroy', 'BookController@destroy')->name('book.destroy');


