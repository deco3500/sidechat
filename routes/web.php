<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'DiscussionController@index');


Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/welcome', 'DiscussionController@index');

Route::get('/top', 'DiscussionController@topIndex');

Route::get('/new-discussions', 'DiscussionController@newIndex');

Route::get('/controversial', 'DiscussionController@controversialIndex');

Route::get('/submit', function () {
    return view('submit');
})->middleware('auth');

Route::post('/submit', 'DiscussionController@submit')->middleware('auth');

Route::get('/comments/{id}', 'CommentController@index');

Route::get('/submitcomment', function () {
    return view('/home');
})->middleware('auth');

Route::post('/submitcomment', 'CommentController@submit')->middleware('auth');

Route::get('/submitvote', function () {
    return view('/home');
})->middleware('auth');

Route::post('/submitvote', 'CommentController@submitVote')->middleware('auth');
