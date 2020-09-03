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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::resource('film', 'FilmController')->middleware('auth');
Route::resource('actor','ActorController')->middleware('auth');
Route::resource('genre','GenreController')->middleware('auth');
Route::resource('role', 'RoleController')->middleware('auth');
Route::resource('producer', 'ProducerController')->middleware('auth');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/actor/restore/{id}',['uses' => 'ActorController@restore',
      'as' => 'actor.restore']);
Route::get('/film/restore/{id}',['uses' => 'FilmController@restore',
      'as' => 'film.restore']);
