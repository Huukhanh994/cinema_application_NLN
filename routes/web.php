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
        Route::get('/now_showing', 'Site\MoviesController@getNowShowing')->name('movies.now_showing');
        Route::get('/now_showing/{slug}', 'Site\MoviesController@show')->name('movies.now_showing_slug');
        Route::get('/now_showing_ajax', 'Site\MoviesController@getAjax')->name('movies.now_showing_ajax');
        Route::get('/now_showing_ajaxGetRoom', 'Site\MoviesController@getRoomAjax')->name('movies.now_showing_getRoomAjax');
        // Ratings Post
        Route::post('/post_ratings', 'Site\MoviesController@postRatings')->name('movies.post_ratings');
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

    Route::group(['prefix' => 'account'], function () {
        Route::get('profile','Site\AccountOrdersController@profile')->name('account.profile');
        Route::get('orders', 'Site\AccountOrdersController@getOrders')->name('account.orders');
        Route::get('orders/details/{id}', 'Site\AccountOrdersController@getOrdersDetail')->name('account.orders_details');
        Route::post('updateInfo/{id}','Site\AccountOrdersController@updateInfo')->name('account.updateInfo');
    });


    Route::group(['prefix' => 'cinemas'], function () {
        Route::get('/', 'Site\CinemaController@index')->name('cinemas.index');
        Route::get('/showCluster','Site\CinemaController@showClusters')->name('cinemas.showClusters');
    });
    // Route::view('/admin', 'admin.dashboard.index')->name('admin.dashboard');
    // Route::view('/admin/login', 'admin.auth.login')->name('admin.login');    

    Route::group(['prefix' => 'cultureplex'], function () {
        Route::get('/group_sale', function() {
            return view('site.pages.cultureplex.group_sale');
        }
        )->name('cultureplex.group_sale');
        Route::get('/online_store', function () {
            return view('site.pages.cultureplex.online_store');
        })->name('cultureplex.online_store');
        Route::get('/e_cgv', function () {
            return view('site.pages.cultureplex.e_cgv');
        })->name('cultureplex.e_cgv');
        Route::get('/cgv_restaurant', function () {
            return view('site.pages.cultureplex.cgv_restaurant');
        })->name('cultureplex.cgv_restaurant');
        Route::get('/gift_card', function () {
            return view('site.pages.cultureplex.gift_card');
        })->name('cultureplex.gift_card');
        });

    Route::group(['prefix' => 'contact'], function () {
        Route::get('/', function () {
            return view('site.pages.contact.index');
        })->name('contact.index');
    });

    Route::group(['prefix' => 'search'], function () {
        Route::get('/search_get','Site\SearchController@searchGet')->name('search.search_get');
    });
    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
