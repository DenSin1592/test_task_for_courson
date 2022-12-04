<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(static function() {

    Route::prefix('v1')->namespace('V1')->name('v1.')->group(static function(){
        Route::resource('/contact', 'Contacts\ContactsController')->except(['create']);
    });

});

Route::get('{url}', static function() { return \Response::json([], 404);})->where('url', '.*');
