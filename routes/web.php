<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserListController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AboutContentController;


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
Route::get('about', 'AboutContentController@index');
Route::get('blogs', 'PostController@index');
Route::get('admin', [AdminController::class, 'index']);
Route::get('users', [UserListController::class, 'index']);
Route::get('edit_user/{id}', [UserListController::class, 'edit']);
Route::get('delete_user/{id}', [UserListController::class, 'destroy']);
Route::get('about', 'AboutContentController@index');
Route::get('contact', 'AboutContentController@contact_page');
Route::post('update_user', 'UserListController@update');
Route::get('messages', 'MessageController@index');
Route::post('new-message', 'MessageController@store');
Route::post('add_comment', 'CommentController@store');
Route::post('update_home_slider', 'SliderContentController@update_slider');
Route::post('email_response', 'MessageController@contactPost');

// check for logged in user
Route::middleware(['auth'])->group(function () {
    Route::get('new-post', 'PostController@create');
    Route::post('new-post', 'PostController@store');
    Route::get('edit/{slug}', 'PostController@edit');
    Route::post('update_blog', 'PostController@update');
    Route::get('delete/{id}', 'PostController@destroy');
    Route::post('comment/delete/{id}', 'CommentController@distroy');
    Route::post('update_about_content', 'AboutContentController@update');
    Route::post('update_blog_banner', 'PostController@update_banner');
    Route::post('update_slug_banner', 'PostController@update_slug_banner');
    Route::post('update_about_banner', 'AboutContentController@update_about_banner');
    Route::post('update_contact_banner', 'AboutContentController@update_contact_banner');
    Route::view('/edit-content', 'layouts.edit_content');
    Route::view('/analytics', 'layouts.admin.admin_analytics');
    Route::view('/stats', 'layouts.admin.admin_stats');
  });


Route::get('/{slug}', ['as' => 'post', 'uses' => 'PostController@show'])->where('slug', '[A-Za-z0-9-_]+');
Auth::routes();
Route::get('logout', function(){
    Session::flush();
    Auth::logout();
    return Redirect::to("/")
        ->with('message', array('type' => 'success', 'text' => 'You have successfully logged out'));
});
