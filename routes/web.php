<?php

use Illuminate\Support\Facades\Route;

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
    return view('index'); 
});

Route::get('/test', function () {
    return view('users.live-tournament');
})->name('test');

Route::get('/tournaments','TournamentController@index')->name('tournaments');
    //Route::put('/categories','CategoryController@update');
    //Route::post('/tournamets','TeamController@store');
    //Route::delete('/categories','CategoryController@destroy');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::middleware(['auth'])->group(function() {

    Route::get('/inicio',function () {return view('index');})->name('inicio');

    Route::get('/teams','TeamController@index')->name('teams');
    //Route::put('/categories','CategoryController@update');
    Route::post('/teams','TeamController@store');
    //Route::delete('/categories','CategoryController@destroy');

    Route::get('/members','MemberController@index')->name('members');
    //Route::put('/categories','CategoryController@update');
    Route::post('/members','MemberController@store');
    //Route::delete('/categories','CategoryController@destroy');

    Route::get('/profile','ProfileController@index')->name('profile');
    Route::get('/change-password','ProfileController@changePass')->name('change-password');
    //Route::put('/categories','CategoryController@update');
    Route::post('/profile','ProfileController@store');
    Route::delete('/profile','ProfileController@destroy');

    Route::get('/admin-users','ProfileController@index')->name('admin-users');
    Route::get('/edit-user/{id}','ProfileController@editUser')->name('edit-user');
    //Route::put('/admin-users','CategoryController@update');
    Route::post('/admin-users','ProfileController@store');
    //Route::delete('/admin-users','CategoryController@destroy');

    Route::get('/admin-teams','TeamController@index')->name('admin-teams');
    //Route::put('/admin-teams','teamController@update');
    Route::post('/admin-teams','TeamController@store');
    //Route::delete('/admin-teams','teamController@destroy');
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
