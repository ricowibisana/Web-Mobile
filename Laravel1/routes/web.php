<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', 'PublicController@index');

Route::get('/fakultas', ['as' => 'fakultas.fakultas', 'uses' => 'FakultasController@index']);
Route::get('/fakultasCreate', 'FakultasController@create');
Route::post('/fakultasStore', 'FakultasController@store');
Route::get('/fakultasDelete{id_fakultas}', 'FakultasController@delete');
Route::get('/fakultasUpdate{id_fakultas}', 'FakultasController@update');
Route::post('/fakultasUpdateStore/{id_fakultas}', 'FakultasController@updateStore');

Route::get('/jurusan', ['as' => 'jurusan.jurusan', 'uses' => 'JurusanController@index']);
Route::get('/jurusanCreate', 'JurusanController@create');
Route::post('/jurusanStore', 'JurusanController@store');
Route::get('/jurusanDelete{id_jurusan}', 'JurusanController@delete');
Route::get('/jurusanUpdate{id_jurusan}', 'JurusanController@update');
Route::post('/jurusanUpdateStore/{id_jurusan}', 'JurusanController@updateStore');
Route::get('/jurusanSearch', 'JurusanController@search');

