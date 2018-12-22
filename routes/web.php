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

Route::get('/', 'IndexController@index');

Route::get('logout', function(){
   \Auth::logout();
   return redirect('/');
});
Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('publish-post', 'IndexController@publish');

    Route::post('publish-post', 'IndexController@store');
});

Route::get('post/{slug}/{id}', 'IndexController@post');

Route::get('about', function() {
   return view('about');
});

Route::get('contact', function() {
    return view('contact');
});

