<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/addPost', 'App\Http\Controllers\api\PostController@AddPost');
Route::get('/listUserPosts', 'App\Http\Controllers\api\PostController@listUserPosts');
Route::get('/listTopPosts', 'App\Http\Controllers\api\PostController@listTopPosts');
Route::post('/addReview', 'App\Http\Controllers\api\PostController@AddReview');
