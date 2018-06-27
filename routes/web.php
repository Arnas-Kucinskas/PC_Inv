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
    return view('welcome');
});

/*Route::get('/create_pc', function () {
    return view('create_pc');
});*/
Route::get('/create_pc','PagesControler@create_pc' );
Route::get('/create_user','PagesControler@create_user' );

Route::resource('computer', 'PcController');
Route::resource('vart', 'VartController');
Route::resource('pclist', 'PcListController');

Route::post('computer', 'PcController@filterOS');
//Route::get('computer/posts?', 'PcController@index');

// just make a new controller
//Route::post('new-project', array('uses' => 'ProjectController@createProject'));
