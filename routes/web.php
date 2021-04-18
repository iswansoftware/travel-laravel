<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::prefix('admin')->namespace('Admin')
->middleware('auth', 'admin')
->group(function(){
    Route::get('/', 'DashboardController@index')->name('dashboard');

    // travelpackages routes
    Route::get('/travel-package/index', 'TravelPackageController@index')->name('travel-package.index');
    Route::get('/travel-package/create', 'TravelPackageController@create')->name('travel-package.create');
    Route::post('/travel-package/store', 'TravelPackageController@store')->name('travel-package.store');
    Route::get('/travel-package/edit/{id}', 'TravelPackageController@edit')->name('travel-package.edit');
    Route::put('/travel-package/update/{id}', 'TravelPackageController@update')->name('travel-package.update');
    Route::get('/travel-package/destroy/{id}', 'TravelPackageController@destroy')->name('travel-package.destroy');


    // gallery
    Route::get('/gallery/index', 'GalleryController@index')->name('gallery.index');
    Route::get('/gallery/create', 'GalleryController@create')->name('gallery.create');
    Route::post('/gallery/create', 'GalleryController@store')->name('gallery.store');
    Route::get('/gallery/edit/{id}', 'GalleryController@edit')->name('gallery.edit');
    Route::put('/gallery/update/{id}', 'GalleryController@update')->name('gallery.update');
    Route::get('/gallery/destroy/{id}', 'GalleryController@destroy')->name('gallery.destroy');

    // transaksi
    Route::get('/transaction/index', 'TransactionController@index')->name('transaction.index');
    Route::get('/transaction/show/{id}', 'TransactionController@show')->name('transaction.show');
    Route::get('/transaction/edit/{id}', 'TransactionController@edit')->name('transaction.edit');
    Route::put('/transaction/update/{id}', 'TransactionController@update')->name('transaction.update');
    Route::get('/transaction/destroy/{id}', 'TransactionController@destroy')->name('transaction.destroy');

    // kembali ke halaman transaksi
    Route::get('/transaksi/kembalihalamanindex', 'TransactionController@backIndex')->name('transaction.back');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
