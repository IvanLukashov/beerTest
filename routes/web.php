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


Route::get('/', 'HomeController@index')->name('home');

Route::resource('brewery', 'Brewery\BreweryController', ['except' => [
    'show'
]]);
Route::resource('beer_type', 'Brewery\BeerTypesController', ['except' => [
    'show'
]]);
Route::resource('beers', 'Brewery\BeerController', ['except' => [
    'show'
]]);
