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

// Route::get('/pengunjung', function()  {
//     return view('pages.visitor');
// });

Route::get('/search_book', function () {
    return view('pages.search_book');
});
Auth::routes();

Route::get('/', 'HomeController@index');
Route::resource('user', 'UserController');
Route::get('/home', 'HomeController@index');
Route::get('/pengunjung', 'VisitorController@index');
Route::post('/inputvisitor', 'VisitorController@check_id')->name('pengunjung.check');
Route::get('/profile/{username}', function ($username) {
    $user = App\User::where('username',$username)->first();

    return view('pages.profile')->with('profile', $user);
});
Route::get('/book/suggest', 'UserbookController@suggest_book');
Route::put('/booksuggest', 'UserbookController@bookstore')->name('inputsuggestion');
Route::get('/book/pinjam/{id}', 'UserbookController@showloan');
Route::get('/riwayat/{id}', 'UserController@historyloan');
Route::get('/dashboard', 'AdminController@index');
Route::put('users/{user}', 'AdminController@update')->name('update.user');