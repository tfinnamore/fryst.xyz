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

Route::get('/', function () {
    return view('home');
});

Route::get('download/{token}', [
  'as' => 'download',
  'middleware' => 'auth',
    function($token) {
      $filepath = env('FILE_STORE_PATH');
      $file = App\Files::where('token', $token)->first();
      return response()->download($filepath.$file->filename, $file->filename);

}]);

Route::group(['prefix' => 'upload'], function(){

	Route::get('/', ['middleware' => 'auth', 'uses' => 'upload@index']);
	Route::post('store', ['uses' => 'upload@store', 'as' => 'upload.store']);

});

Route::group(['prefix' => 'todo'], function(){

	Route::get('/', function(){
				return "wewt";
	});




});

Route::group(['prefix' => 'shop'], function(){

	Route::get('/', function(){
		return "wewt";
	});





});


Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
