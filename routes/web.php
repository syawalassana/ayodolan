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

//Route::get('/', function () {
//      return view('objek_wisata');
//});

use App\Event;


Route::get('/objekwisata','ObjekWisataController@index');
Route::get('/', 'FrontController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/objek-wisata', 'ObjekWisataController');
Route::resource('/wisatawan', 'WisatawanController');
Route::resource('/event', 'EventController');
Route::resource('/hotel', 'HotelController');
Route::resource('/mobil', 'MobilController');
Route::resource('/paket', 'PaketController');
Route::get('/mobil-gambar/{id}','MobilController@tambah_gambar');
Route::post('mobil-gambar','GambarMobilController@store');
Route::delete('mobil-gambar/{id}','GambarMobilController@destroy');
Route::get('/event-gambar/{id}','EventController@tambah_gambar');
Route::post('event-gambar','GambarEventController@store');
Route::delete('event-gambar/{id}','GambarEventController@destroy');
Route::get('/slider',function(){
    return Event::where('tgl_mulai','<=',date('Y-m-d'))->where('tgl_selesai','>=',date('Y-m-d'))->get();

});

