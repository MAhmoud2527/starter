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
    return view('welcome')->with('data' , 'Mahmoud Ahmed');
});
Route::get('/test1', function () {
    return "view('welcome')";
});
Route::get('/landing', function () {
    return view('landing');
});

Route::group(['namespace' => 'Admin'], function () {
    Route::get('/', 'SecondController@ShowName2');
});
Route::get('login', function () {
    return "view('welcome')";
})->name('login');

Auth::routes(['verify'=> true]);

Route::get('/home', 'HomeController@index')->name('home') ->middleware('verified');

