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

Route::group(['prefix' => 'todo', 'middleware' => 'auth'], function(){

  Route::get('/', ['uses' => 'ToDoController@index', 'as' => 'todo.index']);
  Route::get('/create', ['uses' => 'ToDoController@create', 'as' => 'todo.add']);
  Route::post('/store', ['uses' => 'ToDoController@store', 'as' => 'todo.store']);
  Route::get('/{id}/edit', ['uses' => 'ToDoController@edit', 'as' => 'todo.edit']);
  Route::post('/{id}/update', ['uses' => 'ToDoController@update', 'as' => 'todo.update']);
  Route::get('/{id}/delete', ['uses' => 'ToDoController@destroy', 'as' => 'todo.destroy']);
  Route::get('/{id}', ['uses' => 'ToDoController@show', 'as' => 'todo.show']);

});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

  Route::get('/', function(){
    return "Admin stuff goes here";
  });

});

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
