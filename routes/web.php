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
use App\Video;
use App\Post;
use App\Comment;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'TaskController@index');

// Route::get('user', 'TaskController@index');

// Route::get('posts', function(){
//         $post = Post::limit(2)->get();
//         return $post;
// });

// Route::prefix('jobs')->group(function(){
//     Route::get('create', 'TaskController@create');
//     Route::post('create', 'TaskController@store')->name('jobs.store');
// });

// Route::get('/tasks', function(){
//     $post = Post::find(1);
//     $post->tag()->detach(2);
// });

Route::get('posts', function(){
    $post = Video::find(2);
    $comment = new Comment;
    $comment->body = "This comment is for video";
    $post->comments()->save($comment);
});

Route::get('/contacts', 'ContactController@index');
Route::get('/contacts/create', 'ContactController@create')->name('contact.index');
Route::post('/contacts', 'ContactController@store')->name('contact.store');
Route::get('/contacts/{id}/edit', 'ContactController@edit')->name('contact.edit');
Route::post('/contacts/{id}/store', 'ContactController@update')->name('contact.update');
Route::get('/contacts/{id}', 'ContactController@show')->name('contact.show');
Route::post('/contacts/{id}/delete', 'ContactController@destroy')->name('contact.destroy');