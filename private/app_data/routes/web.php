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
    Route::get('/show/{id}', 'Alimento\AlimentoController@show')->name('alimentos.show');
    Route::get('/edit/{id}', 'Alimento\AlimentoController@edit')->name('alimentos.edit');
    Route::get('/destroy/{id}', 'Alimento\AlimentoController@destroy')->name('alimentos.destroy');
});

Route::group(['prefix' => 'receitas'], function() {
    Route::get('', 'Receitas\ReceitasController@index')->name('receitas');
    Route::get('/create', 'Receitas\ReceitasController@create')->name('receitas.create');
    Route::post('/store', 'Receitas\ReceitasController@store')->name('receitas.store');
    Route::get('/show/{id}', 'Receitas\ReceitasController@show')->name('receitas.show');
    Route::get('/edit/{id}', 'Receitas\ReceitasController@edit')->name('receitas.edit');
    Route::get('/destroy/{id}', 'Receitas\ReceitasController@destroy')->name('receitas.destroy');
});

Route::get('/', function() {
    return view('home');
});
