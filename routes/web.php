<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//toda vez que for acessado no navegador a URL /client chama o Controller@metodo
Route::get('client', 'ClientController@index');

#C
Route::post('client', 'ClientController@store');
#R
Route::get('client/{id}', 'ClientController@show');
#U
Route::put('client/{id}', 'ClientController@update');
#D
Route::delete('client/{id}', 'ClientController@destroy');