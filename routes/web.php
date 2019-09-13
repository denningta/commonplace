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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'PostController@index')->name('dashboard');
    Route::get('/posts/create', 'PostController@create')->name('create');
    Route::post('/posts', 'PostController@store')->name('store');
    Route::get('/posts/{post}', 'PostController@show')->name('post');
    Route::get('/posts/{post}/edit', 'PostController@edit')->name('edit');
    Route::patch('/posts/{post}', 'PostController@update')->name('update');
    Route::get('/posts/{post}/delete', 'PostController@delete')->name('delete');
    Route::post('/posts/search', 'PostController@search')->name('search');

    Route::get('/autocomplete', 'PostController@autocomplete')->name('autocomplete');

    Route::get('/account', 'UserController@userEdit')->name('account');
    Route::patch('/account', 'UserController@userUpdate')->name('userUpdate');
    Route::get('/permissions', 'UserController@userPermissions')->name('userPermissions');

    Route::get('/books', 'BookController@index')->name('bookIndex');
    Route::get('/books/{book}', 'BookController@edit')->name('bookEdit');
    Route::patch('/books/{book}', 'BookController@update')->name('bookUpdate');
 });


//posts
//
//GET /posts
//GET /posts/create
//POST /posts
//GET /posts/{id}
//GET /posts/{id}/edit
//PATCH /posts/{id}
//DELETE /posts/{id}

