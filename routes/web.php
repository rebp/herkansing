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

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('/dashboard/users', 'UsersController');

Route::patch('/dashboard/user/status/{user}', 'UsersController@update_status')->name('update.user.status');

Route::resource('/dashboard/profile', 'ProfileController');

Route::resource('/dashboard/posts', 'PostsController');

Route::get('/dashboard/comments/post/{id}', 'PostsController@postComments')->name('show.post.comments');

Route::get('/post/{slug}', "HomeController@show")->name('show.post');

Route::get('/posts/category/{category}', "HomeController@category")->name('posts.category');

Route::get('/posts/search/', "HomeController@search")->name('post.search');

Route::resource('/dashboard/categories', 'CategoriesController');

Route::resource('/dashboard/comments', 'CommentsController');

Route::resource('/dashboard/replies', 'RepliesController');  