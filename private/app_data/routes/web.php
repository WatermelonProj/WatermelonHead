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

Auth::routes();

Route::group(['prefix' => 'alimentos'], function() {
    Route::get('', 'Alimento\AlimentoController@index')->name('alimentos');
    Route::get('/create', 'Alimento\AlimentoController@create')->name('alimentos.create');
    Route::post('/store', 'Alimento\AlimentoController@store')->name('alimentos.store');
    Route::get('/edit/{id}', 'Alimento\AlimentoController@edit')->name('alimentos.edit');
    Route::get('/destroy/{id}', 'Alimento\AlimentoController@destroy')->name('alimentos.destroy');
    Route::post('/teste', function() {
        return 'teste';
    })->name('alimentos.teste');
});

Route::get('/', 'HomeController@index');
