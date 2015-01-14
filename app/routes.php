<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'ArchItemController@index');
Route::resource('items', 'ArchItemController');

/* AJAX Routes */
Route::post('/ajax/guess-item-provider-and-kind', 'ArchItemController@guessProviderAndKind');
