<?php

use App\Mail\ContactMail;
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

// Contact
Route::get('/contact', 'ContactController@index')->name('contact.index');
Route::post('/contact/send', 'ContactController@send')->name('contact.send');
Route::get('/view-email', function () {
    return new ContactMail('ini subject', 'ini message');
});


//profile-changePassword
Route::get('/agen/change-password', 'ProfileController@changePassword')->name('agen.password')->middleware('verified');
Route::get('/admin/change-password', 'ProfileController@changePassword')->name('admin.password')->middleware('verified');
Route::get('/pimpinan/change-password', 'ProfileController@changePassword')->name('pimpinan.password')->middleware('verified');


Route::patch('profile/update/{type}', 'ProfileController@update')->name('profile.update');


Route::get('/agen/tes', 'ProfileController@tes');


// jadwal
route::get('jadwal/create', 'JadwalController@create')->name('jadwal.create');


Route::middleware('verified')->prefix('admin')->name('admin.')->group(function () {
    //dermaga
    Route::get('dermaga', 'DermagaController@index')->name('dermaga.index');
    Route::post('dermaga/tambah', 'DermagaController@store')->name('dermaga.tambah');
    Route::get('dermaga/{dermaga:slug}', 'DermagaController@edit')->name('dermaga.edit');
    Route::patch('dermaga/{dermaga}', 'DermagaController@update')->name('dermaga.update');
    Route::delete('dermaga/{dermaga:slug}', 'DermagaController@destroy')->name('dermaga.delete');

    //user
    Route::get('user', 'UserController@index')->name('user.index');
    Route::get('user/create', 'UserController@create')->name('user.create');
    Route::post('user/store', 'UserController@store')->name('user.store');
    Route::delete('user/{user:email}', 'UserController@destroy')->name('user.destroy');
    Route::get('user/{user:email}/edit', 'UserController@edit')->name('user.edit');
    Route::patch('user/{user:email}/update', 'UserController@update')->name('user.update');

    // jadwal
    route::get('jadwal', 'JadwalController@index')->name('jadwal.index');
    route::get('jadwal/create', 'JadwalController@create')->name('jadwal.create');
    route::delete('jadwal/hapus/{jadwal:order_id}', 'JadwalController@delete')->name('jadwal.delete');

    // kapal
    route::get('/kapal', 'KapalController@index')->name('kapal.index');
    route::post('/kapal/store', 'KapalController@store')->name('kapal.store');
    route::delete('/kapal/delete/{kapal:slug}', 'KapalController@destroy')->name('kapal.destroy');
    route::get('/kapal/edit/{kapal:slug}', 'KapalController@edit')->name('kapal.edit');
    route::patch('/kapal/update/{kapal:slug}', 'KapalController@update')->name('kapal.update');

    //Laporan Kegiatan Kapal
    route::get('/laporan-kegiatan-kapal', 'Laporan\JadwalController@index')->name('laporan.jadwal.index');
    route::post('/laporan-kegiatan-kapal/cetak}', 'Laporan\JadwalController@cetak_jadwal')->name('laporan.jadwal.cetak');

    //laporan Kapal
    route::get('/laporan-kapal', 'Laporan\KapalController@index')->name('laporan.kapal.index');
    route::post('/laporan-kapal/cetak', 'Laporan\KapalController@cetak')->name('laporan.kapal.cetak');
    route::get('/laporan-kapal/cetak-laporan', 'Laporan\KapalController@cetak2')->name('laporan.kapal.cetak2');

    //Laporan Dermaga
    route::get('/laporan-dermaga', 'Laporan\DermagaController@index')->name('laporan.dermaga.index');
    route::post('/laporan-dermaga/cetak', 'Laporan\DermagaController@cetak')->name('laporan.dermaga.cetak');
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
    route::get('jadwal/create', 'JadwalController@create')->name('jadwal.create');

    // kapal
    route::get('/kapal', 'KapalController@index')->name('kapal.index');

    // laporan Kegiatan Kapal
    route::get('/laporan-kegiatan-kapal', 'Laporan\JadwalController@index')->name('laporan.jadwal.index');
    route::post('/laporan-kegiatan-kapal/cetak', 'Laporan\JadwalController@cetak_jadwal')->name('laporan.jadwal.cetak');

    //laporan Kapal
    route::get('/laporan-kapal', 'Laporan\KapalController@index')->name('laporan.kapal.index');
    route::post('/laporan-kapal/cetak', 'Laporan\KapalController@cetak')->name('laporan.kapal.cetak');
    route::get('/laporan-kapal/cetak-laporan', 'Laporan\KapalController@cetak2')->name('laporan.kapal.cetak2');

    //Laporan Dermaga
    route::get('/laporan-dermaga', 'Laporan\DermagaController@index')->name('laporan.dermaga.index');
    route::post('/laporan-dermaga/cetak', 'Laporan\DermagaController@cetak')->name('laporan.dermaga.cetak');
});


route::middleware('verified')->prefix('agen')->name('agen.')->group(function () {
    route::get('jadwal', 'JadwalController@index')->name('jadwal.index');
    route::get('jadwal/create', 'JadwalController@create')->name('jadwal.create');
    route::post('jadwal/store', 'JadwalController@store')->name('jadwal.store');
    route::get('jadwal/{jadwal:order_id}', 'JadwalController@show')->name('jadwal.show');
    route::get('jadwal/print/{jadwal:order_id}', 'JadwalController@print')->name('jadwal.print');
});


Route::get('jadwal', 'JadwalController@page')->name('jadwal.page');

Route::get('jadwal/cek', 'JadwalController@cek')->name('jadwal.cek');

Auth::routes(['verify' => true]);
