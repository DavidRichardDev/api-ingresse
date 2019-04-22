<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('API')->name('api.')->group(function(){
    Route::prefix('clients')->group(function(){
        Route::get('/', 'ClientController@index')->name('list_clients');
        Route::get('/{id}', 'ClientController@show')->name('get_client');

        Route::post('/', 'ClientController@insert')->name('insert_client');
        Route::put('/{id}', 'ClientController@update')->name('update_client');

        Route::delete('/{id}', 'ClientController@delete')->name('delete_client');
    });
});
