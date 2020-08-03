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

Route::get('/animals/search', 'AnimalsController@search');

Route::get('/categories', 'AnimalsController@categories');

Route::get('/categories/{category}', 'AnimalsController@showCategory');

Route::resource('animals', 'AnimalsController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
