<?php

use Illuminate\Http\Request;

Route::get('/posts','PostController@get');
Route::post('/post','PostController@post');
Route::put('/post/{id}','PostController@put');
Route::delete('/post/{id}','PostController@delete');