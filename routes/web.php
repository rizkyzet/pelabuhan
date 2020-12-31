<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\FacadeS\Auth;

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




// dashboard
Route::get('/admin/dashboard', 'DashboardController@index')->name('admin.dashboard')->middleware('verified');
Route::get('/pimpinan/dashboard', 'DashboardController@index')->name('pimpinan.dashboard')->middleware('verified');

//profile
Route::get('/agen', 'ProfileController@index')->name('agen')->middleware('verified');
Route::get('/admin', 'ProfileController@index')->name('admin')->middleware('verified');;
Route::get('/pimpinan', 'ProfileController@index')->name('pimpinan')->middleware('verified');;


//profile-changePassword
Route::get('/agen/change-password', 'ProfileController@changePassword')->name('agen.password')->middleware('verified');
Route::get('/admin/change-password', 'ProfileController@changePassword')->name('admin.password')->middleware('verified');
Route::get('/pimpinan/change-password', 'ProfileController@changePassword')->name('pimpinan.password')->middleware('verified');


Route::patch('profile/update/{type}', 'ProfileController@update')->name('profile.update');


Route::get('/agen/tes', 'ProfileController@tes');


Route::middleware('verified')->prefix('admin')->name('admin.')->group(function () {
    //dermaga
    Route::get('dermaga', 'DermagaController@index')->name('dermaga.index');
    Route::post('dermaga/tambah', 'DermagaController@store')->name('dermaga.tambah');
    Route::get('dermaga/{dermaga:slug}', 'DermagaController@edit')->name('dermaga.edit');
    Route::patch('dermaga/{dermaga}', 'DermagaController@update')->name('dermaga.update');
    Route::delete('dermaga/{dermaga:slug}', 'DermagaController@destroy')->name('dermaga.delete');

    //user
    Route::get('user', 'UserController@index')->name('user.index');

    // jadwal
    route::get('jadwal', 'JadwalController@index')->name('jadwal.index');
});
Route::middleware('verified')->prefix('pimpinan')->name('pimpinan.')->group(function () {
    // dermaga
    Route::get('dermaga', 'DermagaController@index')->name('dermaga.index');
    Route::post('dermaga/tambah', 'DermagaController@store')->name('dermaga.tambah');
    Route::get('dermaga/{dermaga:slug}', 'DermagaController@edit')->name('dermaga.edit');
    Route::patch('dermaga/{dermaga}', 'DermagaController@update')->name('dermaga.update');
    Route::delete('dermaga/{dermaga:slug}', 'DermagaController@destroy')->name('dermaga.delete');

    //user
    Route::get('user', 'UserController@index')->name('user.index');

    // jadwal
    route::get('jadwal', 'JadwalController@index')->name('jadwal.index');
});


route::middleware('verified')->prefix('agen')->name('agen.')->group(function () {
    route::get('jadwal', 'JadwalController@index')->name('jadwal.index');
    route::get('jadwal/create', 'JadwalController@create')->name('jadwal.create');
    route::post('jadwal/store', 'JadwalController@store')->name('jadwal.store');
    route::get('jadwal/{jadwal:order_id}', 'JadwalController@show')->name('jadwal.show');
});


Route::get('jadwal', 'JadwalController@page')->name('jadwal.page');

Route::get('jadwal/cek', 'JadwalController@cek')->name('jadwal.cek');

Auth::routes(['verify' => true]);
