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

Route::get('/search_book', 'UserbookController@searchpage');
Auth::routes();

Route::get('/', 'HomeController@index');
Route::resource('user', 'UserController')->except([
    'create', 'store', 'edit'
]);
Route::get('/home', 'HomeController@index');
Route::get('/pengunjung', 'VisitorController@index');
Route::post('/inputvisitor', 'VisitorController@check_id')->name('pengunjung.check');
Route::get('/profile/{username}', function ($username) {
    $user = App\User::where('username',$username)->first();
        if ($user->id != Auth::user()->id) {
            return redirect('home')->with('error', 'profil tidak cocok!');
        }
        if (!isset($user)) {
            return redirect('home')->with('error', 'Data tidak ditemukan!');
        }

    return view('pages.profile')->with('profile', $user);
})->middleware('auth');
Route::get('/book/suggest', 'UserbookController@suggest_book');
Route::put('/booksuggest', 'UserbookController@bookstore')->name('inputsuggestion');
Route::get('/book/pinjam/{id}', 'UserbookController@showloan');
Route::get('/book/history/{id}', 'UserbookController@historyloan');
Route::get('/searchbook', 'UserbookController@searchbook');
Route::get('/detail/{id}', 'UserbookController@detailbuku');

Route::get('/dashboard', 'AdminController@index');
Route::get('/member/{id}', 'AdminController@searchuser');
Route::put('users/{user}', 'AdminController@update')->name('update.user');
Route::get('users/add', 'AdminController@adduser');
Route::post('users/add', 'AdminController@insertuser')->name('insert.user');
Route::get('/usulanbuku', 'AdminController@usulanbooks');
Route::get('/export/usulanbuku', 'AdminController@exportsuggest');
Route::get('/penerbit', 'AdminController@penerbitget');
Route::get('/penulis', 'AdminController@penulisget');
Route::post('/penulis/add','AdminController@penulisinput');
Route::delete('/penulis/{id}','AdminController@penulisdelete');
Route::post('/penerbit/add','AdminController@penerbitinput');
Route::delete('/penerbit/{id}','AdminController@penerbitdelete');

Route::get('/addbiblio','AdminbookController@addbiblio');
Route::get('/listbiblio','AdminbookController@bibliolist');
Route::post('/biblioadd','AdminbookController@insertbiblio');
Route::get('/addcopy', 'AdminbookController@additem');
Route::post('/bookitem','AdminbookController@insertcopy');
Route::post('autocomplete', 'AdminbookController@search')->name('autocomplete');
Route::get('/showcopy/{id}', 'AdminbookController@showcopy');
Route::get('/showbiblio/{id}', 'AdminbookController@showbiblio');
Route::get('/listitem', 'AdminbookController@itemlist');
Route::put('/editcopy/{book}', 'AdminbookController@editcopy')->name('update.copy');
Route::delete('/deletecopy/{id}', 'AdminbookController@deletecopy');
Route::delete('/deletebiblio/{id}', 'AdminbookController@deletebiblio');
Route::get('/Book/{id}', 'AdminbookController@searchbiblio');
Route::get('/Copy/{id}', 'AdminbookController@searchitem');

Route::get('/transaction/denda', 'TransactionController@transactionissue');
Route::get('/transaction/pinjam', 'TransactionController@transactionloan');
Route::get('/transaction/history', 'TransactionController@transactionhistory');
Route::get('/transaction/reservation', 'TransactionController@transactionreservation');
Route::get('/issue/showmember', 'TransactionController@showmemberissue');
Route::get('/loan/showmember', 'TransactionController@showmemberloan');
Route::get('/reservation/showmember', 'TransactionController@showmembereservation');
Route::get('/history/showmember', 'TransactionController@showmemberhistory');
Route::post('/insertfine', 'TransactionController@addfine');
Route::post('/insertreservation', 'TransactionController@addreservation');
Route::post('/insertloan', 'TransactionController@addloan');
Route::post('/deletereserve', 'TransactionController@deletereservation');
Route::delete('/deletefine/{id}', 'TransactionController@deletefine');
Route::get('/perpanjang', 'TransactionController@perpanjang');
Route::get('/return_book', 'TransactionController@returnbook');