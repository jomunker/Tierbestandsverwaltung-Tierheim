<?php

use Illuminate\Support\Facades\Artisan;
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

/*
Die Route /init erstellt einen neuen Symlink, erstellt über Migrations die Datenbanktabellen und befüllt diese mit Beispielinhalten
*/
Route::get('/init', function () {
    Artisan::call('storage:link');
    Artisan::call('migrate:fresh');
    return redirect('/animals');
});

// sets the landingpage to /animals
Route::redirect('/', '/animals');

// Route for the search function
Route::get('/animals/search', 'AnimalsController@search');

// Route for the species overview
Route::get('/categories', 'AnimalsController@categories');

// Route for a specific species
Route::get('/categories/{category}', 'AnimalsController@showCategory');

// Route to show a specified animal
Route::get('/categories/animals/{animal}', 'AnimalsController@show');

// Route to edit a specified animal
Route::get('/categories/animals/{animal}/edit', 'AnimalsController@edit');

// Routes for all CRUD functions of animals
Route::resource('animals', 'AnimalsController');

// Routes for all CRUD functions of departments
Route::resource('departments', 'DepartmentController');

// Routes for authentification
Auth::routes();