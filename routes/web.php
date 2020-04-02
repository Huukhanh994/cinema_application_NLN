<?php
require 'admin.php';
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

Route::view('/', 'site.pages.home');

Route::get('/category/{slug}', 'Site\CategoryController@show')->name('category.show');

Route::group(['prefix' => 'movies'], function () {
    Route::get('/now_showing','Site\MoviesController@getNowShowing')->name('movies.now_showing');
    Route::get('/now_showing/{slug}','Site\MoviesController@show')->name('movies.now_showing_slug');
    Route::get('/now_showing_ajax','Site\MoviesController@getAjax')->name('movies.now_showing_ajax');
    Route::get('/now_showing_ajaxGetRoom','Site\MoviesController@getRoomAjax')->name('movies.now_showing_getRoomAjax');
});

Route::get('/book_tickets/{id}','Site\BookTicketsController@getBookTickets')->name('booking.book_tickets');

// Route::view('/admin', 'admin.dashboard.index')->name('admin.dashboard');
// Route::view('/admin/login', 'admin.auth.login')->name('admin.login');    

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
