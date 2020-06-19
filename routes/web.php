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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/pengunjung', function()  {
    return view('pages.visitor');
});
Route::get('/search_book', function () {
    return view('pages.search_book');
});
Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
