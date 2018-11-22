<?php

use Illuminate\Http\Request;
use App\User;
use App\Post;


//user routes
Route::get('/users','UserController@getUsers');
Route::post('/user','UserController@addUser');

//post routes
Route::get('/posts','PostController@getAllPosts');
Route::get('/users/{user_id}/posts','PostController@getPosts');
Route::post('/users/{user_id}/post','PostController@addPost');


//like 
Route::post('/posts/{post_id}/like','PostController@addLike');

//commnet 
Route::post('/posts/{post_id}/comment','PostController@addComment');
Route::get('/posts/{post_id}/comments','PostController@getComments');
Route::delete('/posts/{post_id}/comments/{comment_id}','PostController@deleteComment');
