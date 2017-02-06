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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function(){
   return view('about');
});

Route::get('/contact', function(){
    return view('contact');
});


Route::group(['middleware'=>'guest'],function() {
    Route::get('/login', function(){
        return view('login');
    });
    Route::post('/login','UserController@authenticate');


    Route::get('/register', function(){
        return view('register');
    });
    Route::post('/register', 'UserController@register');
});

Route::group(['middleware'=>'auth'],function() {
    Route::get('/dashboard','ProjectController@getProjects');

    //temp
    Route::get('/dashboard/project/add/{name}/{description}', 'ProjectController@addProject');

    Route::get('/logout', function(){
        Auth::logout();
        return redirect('/login');
    });
});