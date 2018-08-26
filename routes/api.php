<?php

Route::get('categories', 'CategoryController@index');
Route::get('posts', 'PostController@index');
Route::get('posts/{post}', 'PostController@show');
Route::post('posts', 'PostController@store');
Route::put('posts/{post}', 'PostController@update');
Route::delete('posts/{post}', 'PostController@delete');
