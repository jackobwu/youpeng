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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// User Profile

Route::get('/user/{username}', 'ProfileController@getProfile')->name('profile.index');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/profile/edit', 'ProfileController@getEdit')->name('profile.edit');

	Route::post('/profile/edit', 'ProfileController@postEdit');

    // Search

    Route::get('/search', 'SearchController@getResults')->name('search.results');
    
    // Friends

    Route::get('/friends', 'FriendController@index')->name('friends.index');
    
    Route::get('/friends/add/{username}', 'FriendController@getAdd')->name('friends.add');

	Route::get('/friends/accept/{username}', 'FriendController@getAccept')->name('friends.accept');

    Route::post('/friends/delete/{username}', 'FriendController@postDelete')->name('friends.delete');
    
    // Statuses

    Route::post('/statuses', 'StatusController@postStatus')->name('status.post');
    
    Route::post('/statuses/{statusId}/reply', 'StatusController@postReply')->name('status.reply');

    Route::get('/statuses/{statusId}/like', 'StatusController@getLike')->name('status.like');

});
