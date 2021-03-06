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
Route::get('/profile/{username}', 'HomeController@profile')->name('profile');

Route::resource('tweets', 'TweetController');

Route::post('/follow/{user}', 'UserController@followUser')->name('user.follow');
Route::post('/unfollow/{user}', 'UserController@unFollowUser')->name('user.unfollow');
