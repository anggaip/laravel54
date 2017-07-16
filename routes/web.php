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

Route::get('/', 'MainController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('{username?}/pending', 'UserNotVerifiedController@pending')->name('pending');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::group(['namespace' => 'Admin', 'prefix' => 'admindashboard', 'middleware' => ['auth', 'admin']], function() {

	Route::get('home', 'AdminDashboard@index')->name('home');

	Route::resource('categories', 'CategoriesController');

	Route::resource('posts', 'PostsController');

	Route::put('posts/replace_thumbnail/{id}', 'PostsController@replace_thumbnail');

});

Route::resource('category', 'MainController');

Route::get('{category}/{title}', 'MainController@postDetail');

Route::get('form_bukalapak', function() {
	return response()->view('bukalapak.form');
});

Route::get('bukalapak_auth', 'BukalapakController@index');

Route::post('bl_auth', 'BukalapakController@auth');