<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::group(['middleware' => ['api', 'cors']], function() {

	Route::get('category', function() {
		return App\Category::all();
	});

	Route::put('category/{id}', function(Request $request, $id) {
		App\Category::findOrFail($id)->update([
			'category_name' => $request->name,
			]);
		return response()->json(['sip' => 'oke']);
		//return $id;
	});

	Route::get('articles', function() {
		return App\Post::latest()->orderBy('created_at', 'DESC')->get();
	});

	Route::get('user', function() {
		$user = App\User::first();
		//$token = JWTAuth::fromUser($user);
		//return response()->json(compact('token'));
		return response()->json(compact('user'));
	});

	Route::post('login', function(Request $request) {
		$user = $request->all();
		$check = App\User::where('email', $user['username'])->get();
		if (Auth::attempt(['email' => $user['username'], 'password' => $user['password']])) {
			return $user;
		} else {
			return response()->json(['error' => 'invalid']);
		}
		
	});

	Route::get('bukalapak_auth', 'BukalapakController@index');

	Route::post('bl_auth', 'BukalapakController@auth');

});