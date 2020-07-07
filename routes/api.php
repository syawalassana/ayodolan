<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->group(function () {
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@login');

    Route::middleware('auth:api')->group(function () {
        Route::post('logout', 'UserController@logout');
    });
});

Route::post('transaksi/buat_transaksi', 'Api\TransaksiController@buat_transaksi');

Route::get('user', 'Api\HomeController@index');
Route::get('user-res', 'Api\HomeController@getUserResource');
Route::get('user-res-one', 'Api\HomeController@getUserResourceOne');
Route::get('data_objek_wisata','Api\ObjekWisataController@index');
Route::get('data_transaksi','Api\TransaksiController@index');
Route::get('data_hotel','Api\HotelController@index');
Route::get('data_event','Api\EventController@index');
Route::get('data_mobil','Api\MobilController@index');
Route::get('data_paket','Api\PaketController@index');
Route::get('data_wisatawan','Api\WisatawanController@index');