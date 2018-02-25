<?php

Route::get('/test', function(){
     return App\Post::find(5)->category;
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Auth middleware
Route::middleware('auth')->group(function (){

    // Post
    Route::get('/admin/post/', 'PostController@index')->name('post.index');
    Route::post('/admin/post/', 'PostController@store')->name('post.store');
    Route::get('/admin/post/create', 'PostController@create')->name('post.create');
    Route::get('/admin/post/trash', 'PostController@trash')->name('post.trash');        
    Route::get('/admin/post/{id}', 'PostController@restore')->name('post.restore');
    Route::patch('/admin/post/{id}', 'PostController@update')->name('post.update');
    Route::post('/admin/post/{id}', 'PostController@destroy')->name('post.destroy');
    Route::delete('/admin/post/{id}', 'PostController@emptyTrash')->name('post.emptyTrash');
    Route::get('/admin/post/{id}/edit', 'PostController@edit')->name('post.edit');

    // Category
    Route::get('/admin/category/', 'CategoryController@index')->name('category.index');
    Route::post('/admin/category/', 'CategoryController@store')->name('category.store');
    Route::get('/admin/category/create', 'CategoryController@create')->name('category.create');
    Route::get('/admin/category/{id}', 'CategoryController@show')->name('category.show');
    Route::patch('/admin/category/{id}', 'CategoryController@update')->name('category.update');
    Route::delete('/admin/category/{id}', 'CategoryController@destroy')->name('category.destroy');
    Route::get('/admin/category/{id}/edit', 'CategoryController@edit')->name('category.edit');

    // Tag
    Route::get('/admin/tag/', 'TagController@index')->name('tag.index');
    Route::post('/admin/tag/', 'TagController@store')->name('tag.store');
    Route::get('/admin/tag/create', 'TagController@create')->name('tag.create');
    Route::get('/admin/tag/{id}', 'TagController@show')->name('tag.show');
    Route::patch('/admin/tag/{id}', 'TagController@update')->name('tag.update');
    Route::delete('/admin/tag/{id}', 'TagController@destroy')->name('tag.destroy');
    Route::get('/admin/tag/{id}/edit', 'TagController@edit')->name('tag.edit');
});