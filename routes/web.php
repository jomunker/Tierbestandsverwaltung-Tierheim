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

Route::get('/', 'PagesController@index');

Route::get('/single-animal', 'PagesController@showAnimal');

Route::get('/create-animal', 'PagesController@createAnimal');

Route::get('/edit-animal', 'PagesController@editAnimal');

Route::get('/overview-breeds', 'PagesController@viewBreeds');

Route::get('/create-breed', 'PagesController@createBreed');

Route::get('/edit-breed', 'PagesController@editBreed');


Route::resource('animals', 'AnimalsController');


