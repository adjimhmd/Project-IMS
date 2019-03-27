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

Route::get('/datasource', 'DataSourceController@index')->name('datasource');
Route::post('/datasource/sementara', 'DataSourceController@sementara')->name('datasource.sementara');
Route::post('/datasource', 'DataSourceController@store')->name('datasource.store');

Route::get('/generate', 'GenerateController@index')->name('generate');
Route::resource('/template', 'TemplateController');