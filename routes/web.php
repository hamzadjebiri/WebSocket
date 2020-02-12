<?php

use App\User;




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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/sendMessage', 'chatController@sendMessage');


Route::post('/SendPosts' , 'PostController@AddNewPost');

Route::get('/GetPosts' , 'PostController@GetPosts');


Route::get('/ReadOnePost/{post_id}' , 'PostController@ReadOnePost');


Route::get('/getComments/{post_id}' , 'PostController@getComments');


Route::post('/AddNewComments' , 'PostController@AddNewComments');



Route::get('/getNotifications' , 'PostController@getNotifications');


    
Route::get('/broadcasting/auth', '\Illuminate\Broadcasting\BroadcastController@authenticate'); 

    
Route::get('/test', 'chatController@test');

