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

// pages

Route::get('/', 'PagesController@index')->name('home');

Route::get('/about', 'PagesController@about');

Route::get('/contact', 'PagesController@contact');

// messages

Route::get('/messages', 'MessagesController@allMessages');

Route::post('/messages', 'MessagesController@storeMessages')->name('all.messages');

Route::get('/messages/{id}', 'MessagesController@showMessage')->name('show.message');

Route::delete('/messages/{id}', 'MessagesController@deleteMessage')->name('delete.message');

// auth

Auth::routes();

//back-end-posts

Route::resource('posts', 'PostsController');

// categories

Route::get('/categories', 'CategoriesController@allCategories')->name('all.categories');

Route::post('/categories', 'CategoriesController@storeCategory')->name('store.category');

Route::get('/categories/{id}', 'CategoriesController@showCategory')->name('show.category');

Route::get('/categories/{id}/edit', 'CategoriesController@editCategory')->name('edit.category');

Route::put('/categories/{id}', 'CategoriesController@updateCategory')->name('update.category');

Route::delete('/categories/{id}', 'CategoriesController@deleteCategory')->name('delete.category');

// front-end-blogs

Route::get('blog/{slug}', ['as' => 'blog.post', 'uses' => 'BlogsController@post'])->where('slug', '[\w\d\-\_]+');

Route::get('blog', 'BlogsController@index');
