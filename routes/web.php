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
//Change Avatar
Route::post('/home','HomeController@changeAvatar')->name('avatar');
//Edit Profile
Route::post('','HomeController@updateProfile')->name('update');
//Get message
Route::get('/message/{id}', 'HomeController@getMessage')->name('messages');
//Send message
Route::post('message', 'HomeController@sendMessage');

Route::get('/friends', 'FriendController@index')->name('friends');

Route::post('/add', 'HomeController@addContact')->name('add-friend');


//Broadcast::channel()