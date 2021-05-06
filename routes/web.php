<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Auth;
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
  return view('layouts.home');
});
Route::get('/', 'PostController@fetch_blogs');
Route::view('/login', 'auth.login');
Route::view('/register', 'auth.register');
Route::get('blog', 'PostController@index');
Route::get('admin', [AdminController::class, 'index']);

//logout
Route::get('logout', function(){
  Session::flush();
  Auth::logout();
  return Redirect::to("/")
    ->with('message', array('type' => 'success', 'text' => 'You have successfully logged out'));
});


// check for logged in user
Route::middleware(['auth'])->group(function () {  
    // show new post form
    Route::get('new-post', 'PostController@create');
    // save new post
    Route::post('new-post', 'PostController@store');
    // edit post form
    Route::get('edit/{slug}', 'PostController@edit');
    // update post
    Route::post('update', 'PostController@update');
    // delete post
    Route::get('delete/{id}', 'PostController@destroy');
    // display user's all posts
    Route::get('my-all-posts', 'UserController@user_posts_all');
    // display user's drafts
    Route::get('my-drafts', 'UserController@user_posts_draft');
    // add comment
    Route::post('comment/add', 'CommentController@store');
    // delete comment
    Route::post('comment/delete/{id}', 'CommentController@distroy');
  });

  //users profile
Route::get('user/{id}', 'UserController@profile')->where('id', '[0-9]+');
// display list of posts
Route::get('user/{id}/posts', 'UserController@user_posts')->where('id', '[0-9]+');
// display single post
Route::get('/{slug}', ['as' => 'post', 'uses' => 'PostController@show'])->where('slug', '[A-Za-z0-9-_]+');
Auth::routes();

