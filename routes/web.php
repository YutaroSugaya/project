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

//ホーム画面を表示
Route::get('/','BlogController@showHome')->name('homes');

//ブログ画面一覧
Route::get('/blog/blogs','BlogController@showList')->name('blogs');

//登録画面
Route::get('/blog/create', 'BlogController@showCreate')->name('create');

//登録
Route::post('/blog/store', 'BlogController@exeStore')->name('store');

//詳細画面
Route::get('/blog/{id}','BlogController@showDetail')->name('show');

//編集画面を表示
Route::get('/blog/edit/{id}','BlogController@showEdit')->name('edit');

//商品の更新
Route::post('/blog/update', 'BlogController@exeUpdate')->name('update');

//削除
Route::post('/blog/delete/{ID}', 'BlogController@exeDelete')->name('delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// 検索機能
Route::get('/search', 'BlogController@getSearch')->name('search');
