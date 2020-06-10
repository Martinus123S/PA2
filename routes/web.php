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

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/verify',function(){
    return view('verify');
})->name('verify');
Route::post('/verify','UserController@verify')->name('verify');
// Route::get('/admin',function(){
//     return view('admin');
// })->middleware('role')->name('admin');


// Route::get('/login','UserController@login')->name('login')->middleware('auth');
// Route::get('/register','UserController@register')->name('register')->middleware('guest');

Route::post('/login','UserController@postLogin')->middleware('guest')->name('login');
Route::post('/register','UserController@store')->middleware('guest');

//Route Admin
Route::get('/logoutadmin','AdminController@logout')->middleware('role')->name('logout');
Route::get('/admin','AdminController@index')->middleware('role')->name('adminn');
Route::get('/daftar','AdminController@daftar')->middleware('role')->name('daftarahlibahasa');
Route::post('/daftar','AdminController@prosesDaftar')->middleware('role')->name('daftarahli');
Route::get('/lihatuser','AdminController@lihatuser')->middleware('role')->name('lihatuser');
Route::get('/lihatperbaikan','AdminController@lihatchecking')->middleware('role')->name('lihatfixed');
Route::get('/notif','AdminController@notif')->middleware('role')->name('notif');
Route::get('/kirim/{id}/{total}','AdminController@sendnotif')->middleware('role')->name('sendnotif');
Route::get('/kirimid/{id}/{total}','AdminController@sendnotifid')->middleware('role')->name('sendnotif');
Route::get('/lihatword','AdminController@lihatword')->middleware('role')->name('lihatword');
//Route Postagger
Route::get('/dashboard','PostagController@index')->middleware('role')->name('user');
Route::get('/tagger','PostagController@coba');
Route::post('/count','PostagController@store')->name('cobalagi');
Route::get('/logout','PostagController@logout')->middleware('role')->name('logoutuser');
Route::get('/tagging','PostagController@tagging')->middleware('role')->name('tagging');
Route::get('/fixxing','PostagController@fixxing')->middleware('role')->name('fixxing');
Route::post('/dofix','PostagController@doFix')->middleware('role')->name('dofix');
Route::get('/profile','PostagController@profile')->middleware('role')->name('profile');
Route::get('/notifuser','PostagController@notif')->middleware('role')->name('notifuser');
//Route Ahlibahasa
Route::get('/ahli','AhliController@index')->middleware('role')->name('ahlibahasa');
Route::get('/periksa','AhliController@periksa')->middleware('role')->name('periksacheck');
Route::get('/check','AhliController@periksacheck')->middleware('role')->name('checking');
Route::get('/update/{id}','AhliController@update')->middleware('role')->name('update');
Route::get('/reject/{id}','AhliController@reject')->middleware('role')->name('reject');
Route::get('/updateword/{id}','AhliController@updateword')->middleware('role')->name('updateword');
Route::get('/rejectword/{id}','AhliController@rejectword')->middleware('role')->name('rejectword');