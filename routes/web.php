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

Route::get('/categories/animals/{animal}', 'AnimalsController@show');

Route::resource('animals', 'AnimalsController');

Route::resource('departments', 'DepartmentController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
