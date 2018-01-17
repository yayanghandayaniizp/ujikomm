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
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin', 'middleware'=>['auth','role:admin']], function(){	

Route::resource('User', 'AkunController');
Route::resource('Wilayah', 'WilayahController');
Route::resource('Merek', 'MerekController');
Route::resource('Iklan', 'IklanController');
Route::resource('Type', 'TypekamarController');
Route::resource('Pengunjung', 'PengunjungController');
Route::resource('Petugas', 'PetugasController');
});
