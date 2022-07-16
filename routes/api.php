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

Route::get('ver','API\VerController@index');

// 以下を追加！
Route::get('test', 'TestAPIController@index');

Route::get('ver','API\VerController@index');



Route::group(['middleware' => ['api']], function(){
  Route::resource('articles', 'Api\ArticlesController', ['except' => ['create', 'edit']]);
Route::middleware(['middleware' => 'api'])->group(function () {
    # 投稿作成
    Route::post('/posts/create', 'PostController@create');
    # 投稿一覧表示
    Route::get('/posts', 'PostController@index');
    # 投稿表示
    Route::get('/posts/{id}', 'PostController@show');
    # 投稿編集
    Route::patch('/posts/update/{id}' , 'PostController@update');
    # 投稿削除
    Route::delete('/posts/{id}', 'PostController@delete');
});
