<?php

use Illuminate\Http\Request;

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

// 以下を追加！
Route::get('test', 'TestAPIController@index');

Route::get('ver','API\VerController@index');



Route::group(['middleware' => ['api']], function(){
  Route::resource('articles', 'Api\ArticlesController', ['except' => ['create', 'edit']]);
});
