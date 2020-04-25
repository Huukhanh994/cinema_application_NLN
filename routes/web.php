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

Route::redirect('/en', '/', 301);

Route::get('/', function() {
    return view('site.pages.home');
})->name('homepages');

Route::get('/category/{slug}', 'Site\CategoryController@show')->name('category.show');

Route::group(['prefix' => 'movies'], function () {
    Route::get('/now_showing', 'Site\MoviesController@getNowShowing')->name('movies.now_showing');
    Route::get('/now_showing/{slug}', 'Site\MoviesController@show')->name('movies.now_showing_slug');
    Route::get('/now_showing_ajax', 'Site\MoviesController@getAjax')->name('movies.now_showing_ajax');
    Route::get('/now_showing_ajaxGetRoom', 'Site\MoviesController@getRoomAjax')->name('movies.now_showing_getRoomAjax');
    // Ratings Post
    Route::post('/post_ratings','Site\MoviesController@postRatings')->name('movies.post_ratings');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/book_tickets/id={id}/film={film?}/today={today?}', 'Site\BookTicketsController@getBookTickets')->name('booking.book_tickets');
    Route::get('/add_movie_food', 'Site\BookTicketsController@addMovieFood')->name('booking.add_movie_food');


    # CheckoutController 
    // view
    Route::post('/checkout_movie', 'Site\BookTicketsController@postBookTickets')->name('booking.book_tickets_post');
    // server
    Route::post('/checkout/order', 'Site\CheckoutController@placeOrder')->name('checkout.place.order');
    // view
    Route::get('/checkout/payment/complete', 'Site\CheckoutController@complete')->name('checkout.payment.complete');
});

Route::get('/account/orders','Site\AccountOrdersController@getOrders')->name('account.orders');
Route::get('/account/orders/details','Site\AccountOrdersController@getOrdersDetail')->name('account.orders_details');


Route::group(['prefix' => 'cinemas'], function () {
    Route::get('/','Site\CinemaController@index')->name('cinemas.index');
});
// Route::view('/admin', 'admin.dashboard.index')->name('admin.dashboard');
// Route::view('/admin/login', 'admin.auth.login')->name('admin.login');    
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
