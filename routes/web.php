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
});
Route::prefix('author')->group(function(){
    Route::get('/dashboard','AuthorController@dashboard')->name('author.dashboard');
    Route::get('/comment','AuthorController@comment')->name('author.comment');
    Route::get('/post','AuthorController@post')->name('author.post');
});
Route::prefix('user')->group(function(){
    Route::get('/dashboard','UserController@dashboard')->name('user.dashboard');
    Route::get('/comment','UserController@comment')->name('user.comment');
     Route::get('/profile','UserController@profile')->name('user.profile');
     Route::post('/profile/update','UserController@update')->name('user.profile.update');
});
