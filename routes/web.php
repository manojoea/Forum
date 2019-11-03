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
    $threads = App\Thread::paginate(15);
    return view('welcome', compact('threads'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/threads', 'ThreadController');

Route::resource('comments', 'CommentController',['only'=>['update', 'destroy']]);

Route::post('comments/create/{thread}', 'CommentController@addThreadComment')->name('addThreadComment.store');

Route::post('reply/create/{comment}', 'CommentController@addReplyComment')->name('addReplyComment.store');


