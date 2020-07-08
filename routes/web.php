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
use Illuminate\Support\Facades\Auth;

//Route::get('/objekwisata','ObjekWisataController@index');
//Route::get('/', 'FrontController@index');

Auth::routes();

//Middleware
Route::middleware(['admin'])->group(function () {
    Route::resource('/objek-wisata', 'ObjekWisataController');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::resource('/wisatawan', 'WisatawanController');
    Route::resource('/event', 'EventController');
    Route::resource('/hotel', 'HotelController');
    Route::resource('/mobil', 'MobilController');
    Route::resource('/paket', 'PaketController');
    Route::resource('/transaksi', 'TransaksiController');
    Route::get('/mobil-gambar/{id}', 'MobilController@tambah_gambar');
    Route::post('mobil-gambar', 'GambarMobilController@store');
    Route::delete('mobil-gambar/{id}', 'GambarMobilController@destroy');
    Route::get('/event-gambar/{id}', 'EventController@tambah_gambar');
    Route::post('event-gambar', 'GambarEventController@store');
    Route::delete('event-gambar/{id}', 'GambarEventController@destroy');
    Route::get('/objek_wisata-gambar/{id}', 'ObjekWisataController@tambah_gambar');
    Route::post('objek_wisata-gambar', 'GambarWisataController@store');
    Route::delete('objek_wisata-gambar/{id}', 'GambarWisataController@destroy');
    Route::get('/hotel-gambar/{id}', 'HotelController@tambah_gambar');
    Route::post('hotel-gambar', 'GambarHotelController@store');
    Route::delete('hotel-gambar/{id}', 'GambarHotelController@destroy');
    Route::get('/tambah-wisata/{id}', 'PaketDetailController@tambahWisata');
    Route::post('tambah-wisata', 'PaketDetailController@store');
    Route::delete('/hapus-wisata/{id}', 'PaketDetailController@hapusWisata');
    Route::get('/tambah-detail-wisatawan/{id}', 'TransaksiController@tambah_data');
    Route::post('tambah-detail-wisatawan', 'TransaksiPesertaController@store');
});

Route::get('/slider', function () {
    return Event::where('tgl_mulai', '<=', date('Y-m-d'))->where('tgl_selesai', '>=', date('Y-m-d'))->get();
});
