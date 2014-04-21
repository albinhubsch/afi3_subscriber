<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// 
Route::get('', array('uses' => 'HomeController@showWelcome'));

// 
Route::get('registration', array('uses' => 'SubscriberController@getRegistration'));
Route::post('registration', array('uses' => 'SubscriberController@postRegistration'));

// 
Route::get('login', array('uses' => 'SubscriberController@getLogin'));
Route::post('login', array('uses' => 'SubscriberController@postLogin'));

// 
Route::group(array('before' => 'auth'), function(){

	// Route handles logout requests
	Route::get('logout', array('uses' => 'SubscriberController@getLogout'));

	// 
	Route::get('myprofile', array('uses' => 'SubscriberController@getProfile'));

});

// 
// API ROUTES
// 
Route::get('api/unsecure/getSubscriber/{subscription_number}', array('uses' => 'ApiController@getSubscriberData'));

Route::get('api/secure/getSubscriber/{subscription_number}', array('uses' => 'ApiController@getSubscriberData', 'before' => 'auth.basic'));

