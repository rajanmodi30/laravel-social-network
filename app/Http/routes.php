<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


  Route::get('/',[
    'uses'=>'UserController@index',
    'as'=>'home'
    ] );

Route::get('/account',[
  'uses'=>'UserController@getaccount',
  'as'=>'accountview',
  'middleware'=>'auth'
]);

Route::get('/imageaccount/{filename}',[
  'uses'=>'UserController@image',
  'as'=>'imageshow',
  'middleware'=>'auth',
]);

Route::post('/account/{user_id}',[
  'uses'=>'UserController@postaccount',
  'as'=>'saveaccount'
]);

Route::post('/signup',[
  'uses'=>'UserController@signup',
  'as'=>'signup',
]);

Route::post('/login',[
  'uses'=>'UserController@login',
  'as'=>'login',
]);

Route::get('/dashboard',[
  'uses'=>'PostController@dashboard',
  'as'=>'dashboard',
  'middleware'=>'auth',
]);


Route::post('/postcreate',[
  'uses'=>'PostController@create',
    'as'=>'postcreate',
    'middleware'=>'auth',
]);

Route::get('/delete/{delete_id}',[
  'uses'=>'PostController@delete',
  'as'=>'postdelete',
  'middleware'=>'auth',
]);

Route::get('/logout',[
  'uses'=>'UserController@logout',
  'as'=>'logout',
  'middleware'=>'auth',
]);

Route::get('/edit/{edit_id}',[
  'uses'=>'PostController@edit',
  'as'=>'edit'
]);

Route::post('/like',[
  'uses'=>'PostController@like',
  'as'=>'like',
]);

Route::post('/update/{post_id}',[
  'uses'=>'PostController@update',
  'as'=>'updatepost',
  'middleware'=>'auth',
]);
