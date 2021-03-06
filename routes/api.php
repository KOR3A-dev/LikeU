<?php

use Illuminate\Http\Request;
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

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });


    /**
     * User route group.
     *
     */
    Route::group([
        'middleware' => 'api',
        'prefix' => 'auth'

    ], function ($router) {

        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
        Route::post('register', 'AuthController@register');
    });


    /**
     * Agenda route.
     *
     */
    Route::get('agenda', 'AgendaController@index');
    Route::post('agenda', 'AgendaController@store');
    Route::post('agenda/{id}', 'AgendaController@update');
    Route::get('agenda/{id}', 'AgendaController@show');
    Route::delete('agenda/{id}', 'AgendaController@destroy');

