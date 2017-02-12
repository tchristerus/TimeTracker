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

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', function () {
        return view('login');
    });
    Route::post('/login', 'UserController@authenticate');


    Route::get('/register', function () {
        return view('register');
    });
    Route::post('/register', 'UserController@register');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'ProjectController@getProjects');
    Route::get('/dashboard/teams', 'TeamController@getTeams');


    Route::post('dashboard/project/add', 'ProjectController@addProject');


    // TODO validation
    Route::get('/dashboard/project/remove/{id}', 'ProjectController@removeProject');
    Route::post('/dashboard/team/members', 'TeamController@getMembers');

    Route::post('/dashboard/team/create', 'TeamController@createTeam');
    Route::post('/dashboard/team/join', 'UserController@joinTeam');

    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/login');
    });
});