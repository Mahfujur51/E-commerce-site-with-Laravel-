<?php
use Illuminate\Support\Facades\Route;
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
Route::get('/','PublicController@index')->name('index');
Route::get('/contact','PublicController@contact')->name('contact');
Route::get('/about','PublicController@about')->name('about');
Route::get('/post/{id}','PublicController@singlePost')->name('post');
Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::prefix('admin')->group(function(){
    Route::get('/dashboard','DashboardController@dashboard')->name('admin.dashboard');
    Route::get('/post','DashboardController@post')->name('admin.post');
    Route::get('/comment','DashboardController@comment')->name('admin.comment');
    Route::get('/user','DashboardController@user')->name('admin.user');
    Route::get('/post/delete/{id}','DashboardController@delete')->name('admin.post.delete');
    Route::get('/post/edit/{id}','DashboardController@edit')->name('admin.post.edit');
    Route::post('/post/update/{id}','DashboardController@update')->name('admin.post.update');
});
Route::prefix('author')->group(function(){
    Route::get('/dashboard','AuthorController@dashboard')->name('author.dashboard');
    Route::get('/comment','AuthorController@comment')->name('author.comment');
    Route::get('/post','AuthorController@post')->name('author.post');
    Route::get('/create/post','AuthorController@create')->name('author.create.post');
    Route::post('/store/post','AuthorController@store')->name('author.store.post');
    Route::get('/post/delete/{id}','AuthorController@delete')->name('author.post.delete');
    Route::get('/post/edit/{id}','AuthorController@edit')->name('author.post.edit');
     Route::get('/comment/delete/{id}','AuthorController@commentdelete')->name('author.comment.delete');
    Route::post('/post/update/{id}','AuthorController@update')->name('author.post.update');
});
Route::prefix('user')->group(function(){
    Route::get('/dashboard','UserController@dashboard')->name('user.dashboard');
    Route::get('/comment','UserController@comment')->name('user.comment');
     Route::get('/profile','UserController@profile')->name('user.profile');
     Route::post('/profile/update','UserController@update')->name('user.profile.update');
     Route::get('/comment/delete/{id}','UserController@delete')->name('user.comment.delete');
});
