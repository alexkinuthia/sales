<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'PagesController@Home');

Route::get('Home', 'PagesController@Home');

Route::get('login', 'PagesController@Login');

Route::get('signup', 'PagesController@Signup');

Route::get('signupbranch', 'PagesController@branchSignup');

Route::get('logout', 'PagesController@logout');

Route::get('seeproduct', 'PagesController@seeproduct');

Route::get('seeproduct/{id}','PagesController@seeproduct2');

Route::get('logout','PagesController@logout');

Route::get('seeproduct/{id}/{name}','PagesController@seeproduct3');

Route::post('postsignup', 'PagesController@postsignup');

Route::post('postlogin', 'PagesController@postlogin');

Route::post('create', 'PagesController@create');

Route::get('productcreate', 'PagesController@productcreate');

Route::get('paymentsuccess', 'PaypalController@getPaymentStatus');

Route::get('paymentfail', 'PagesController@paymentfail');

Route::get('editproduct/{id}', 'PagesController@editproduct');

Route::get('reducecartitem/{id}', 'PagesController@reducecartitem');

Route::get('removecartitem/{id}', 'PagesController@removecartitem');

Route::get('packagebought', 'PagesController@packagebought');

Route::post('posteditproduct', 'PagesController@posteditproduct');

Route::get('CheckOut', 'PagesController@CheckOut');

Route::post('addcart', 'PagesController@addcart');

Route::post('payment','PaypalController@postpayment');

Route::get('seecart', 'PagesController@seecart');