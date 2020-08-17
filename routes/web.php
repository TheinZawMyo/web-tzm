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
//     return view('index');
// });

Auth::routes();

Route::group(['prefix' => 'user'], function () {
    Route::get('/home', 'HomeController@adminHome')->name('home');
    Route::get('/profile', 'Admin\ProfileController@profile')->name('profile');
    Route::put('/updateProfile/{id}', 'Admin\ProfileController@updateProfile')->name('updateProfile');
    Route::get('/newPost', 'Admin\PostController@newPost')->name('newPost');
    Route::post('/save', 'Admin\PostController@savePost')->name('savePost');
    Route::get('/edit/{post_id}', 'Admin\PostController@editPost')->name('editPost');
    Route::put('/update/{post_id}', 'Admin\PostController@updatePost')->name('updatePost');
    Route::get('/delete/{post_id}', 'Admin\PostController@deletePost')->name('deletePost');
});

Route::get('/', 'User\UserController@index')->name('index');
Route::group(['prefix' => 'learn'], function () {
    Route::get('/webDesign', 'User\UserController@webDesign')->name('webDesign');
    Route::get('/framework', 'User\UserController@framework')->name('framework');
    Route::get('/programming', 'User\UserController@programming')->name('programming');
    Route::get('/knowledge', 'User\UserController@knowledge')->name('knowledge');
    Route::get('/details/{post_id}', 'User\UserController@details')->name('details');
    Route::post('/like/{post_id}', 'User\UserController@liking')->name('liking');
});
