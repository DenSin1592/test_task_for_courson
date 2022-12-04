<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

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

        Route::namespace('Contacts')->group(static function(){
            Route::get('/contact/favorite', 'ContactsController@indexFavorite')->name('contact.favorite');
            Route::patch('/contact/favorite/{id}', 'ContactsController@updateFavorite')->name('contact.favorite');
            Route::apiResource('/contact', 'ContactsController');
        });

    });

});

Route::get('{url}', static function() { return \Response::json([], ResponseAlias::HTTP_NOT_FOUND);})->where('url', '.*');
