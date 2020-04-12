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

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postLogin', 'AuthController@postLogin');
Route::get('/register', 'AuthController@register');
Route::post('/postRegister', 'AuthController@postRegister');
Route::get('/logout', 'AuthController@logout');


Route::group(['middleware' => ['auth','checkRole:admin']], function(){

    //Fakultas
    Route::get('/fakultas', ['as' => 'fakultas.fakultas', 'uses' => 'FakultasController@index']);
    Route::get('/fakultasCreate', 'FakultasController@create');
    Route::post('/fakultasStore', 'FakultasController@store');
    Route::get('/fakultasDelete/{id_fakultas}', 'FakultasController@delete');
    Route::get('/fakultasUpdate/{id_fakultas}', 'FakultasController@update');
    Route::post('/fakultasUpdateStore/{id_fakultas}', 'FakultasController@updateStore');

    //Jurusan
    Route::get('/jurusan', ['as' => 'jurusan.jurusan', 'uses' => 'JurusanController@index']);
    Route::get('/jurusanCreate', 'JurusanController@create');
    Route::post('/jurusanStore', 'JurusanController@store');
    Route::get('/jurusanDelete/{id_jurusan}', 'JurusanController@delete');
    Route::get('/jurusanUpdate/{id_jurusan}', 'JurusanController@update');
    Route::post('/jurusanUpdateStore/{id_jurusan}', 'JurusanController@updateStore');

    //Ruangan
    Route::get('/ruangan',['as' => 'ruangan.ruangan', 'uses' => 'RuanganController@index']);
    Route::get('/ruanganCreate', 'RuanganController@create');
    Route::post('/ruanganStore', 'RuanganController@store');
    Route::get('/ruanganDelete{id_ruang}', 'RuanganController@delete');
    Route::get('/ruanganUpdate{id_ruang}', 'RuanganController@update');
    Route::post('/ruanganUpdateStore/{id_ruang}', 'RuanganController@updateStore');


});

Route::group(['middleware' => ['auth','checkRole:admin,staff']], function(){
    Route::get('/', 'PublicController@index');


    //barang
    Route::get('/barang', ['as' => 'barang.barang', 'uses' => 'BarangController@index']);
    Route::get('/barangCreate', 'BarangController@create');
    Route::post('/barangStore', 'BarangController@store');
    Route::get('/barangDelete/{id_barang}', 'BarangController@delete');
    Route::get('/barangUpdate/{id_barang}', 'BarangController@update');
    Route::post('/barangUpdateStore/{id_barang}', 'BarangController@updateStore');

});
