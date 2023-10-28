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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/','WelcomeController@store');

//Route::get('/','WelcomeController@index');

//Route::get('/clientes','ClienteController@index');

//Route::post('/clientes','ClienteController@store');

Route::get('/','WelcomeController@index');

Route::get('/clientes','ClienteController@index');

Route::get('/clientes/buscar','ClienteController@buscar');

Route::post('/clientes','ClienteController@store');

Route::get('/clientes/pdf','PDFController@gerarpdf')->name('clientes.pdf');

Route::post('/produtos','ProdutoController@store');

Route::get('/produtos','ProdutoController@index');
