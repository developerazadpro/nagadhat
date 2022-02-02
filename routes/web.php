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




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/* ======================================== admin ============================================= */
Route::get('/admin', 'AdminController@index');
Route::resource('users', 'UserController');
Route::resource('user-groups', 'UserGroupController');


/*======================Order Manage=====================*/
Route::get('pending-order', 'OrderManageController@index');
Route::get('order-details-view/{orderId}', 'OrderManageController@show');




/* ===================================== Public ============================================= */
Route::get('/', 'ProductController@index');
Route::get('product-details/{productId}', 'ProductController@show');



/* ===================== Cart =========================== */
Route::resource('carts', 'CartController');
Route::post('add-to-cart', 'CartController@store');
Route::get('remove-cart/{rowId}', 'CartController@destroy');
Route::post('update-cart/{rowId}', 'CartController@update');
Route::get('checkout', 'CartController@checkout');

/* ====================== Customer ======================= */
Route::get('customer-login', 'CustomerController@login');
Route::post('user-validate', 'CustomerController@userValidation');
Route::get('signup', 'CustomerController@signUp');
Route::post('signup', 'CustomerController@signUpSubmit');
Route::post('order-submit',  'CustomerController@orderSubmit');
Route::get('customer-profile', 'CustomerController@index');
Route::get('update-profile', 'CustomerController@updateProfile');
Route::post('update-profile', 'CustomerController@updateProfile');
Route::get('order-tracking', 'CustomerController@orderTrack');
Route::get('order-details/{orderId}', 'CustomerController@orderDetails');

