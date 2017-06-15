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


#Route::get('/', function () {
#    return view('welcome');
#});
Route::get('/', 'HomeController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'HomeController@index');
    Route::resource('article', 'ArticleController');
    Route::resource('comment', 'CommentController');
    Route::resource('catetory', 'CatetoryController');
});
Route::get('article/{id}', 'ArticleController@show')->where('id','[0-9]+');
Route::post('comment', 'CommentController@store');
Route::get('/catetory/{id?}','CatetoryController@index')->where('id','[0-9]+');
