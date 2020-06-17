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

/**
 * Route Company
 */

Route::group(['namespace' => 'Api'], function() {
    /**
     * Route Company
     */
    Route::post('company', 'CompanyController@store');

    /**
     * Route User
     */
    Route::post('company/{url}/users', 'UserController@store');

    /**
     * Route Auth Sanctum
     */
    Route::post('sanctum/token', 'Auth\AuthController@auth');

    /**
     * Route Authenticate
     */
    Route::group(['middleware' => 'auth:sanctum'], function() {
        /**
         * Route Provider
         */
        Route::apiResource('provider', 'ProviderController');
        Route::get('total-payment', 'ProviderController@payment');
    });

    /**
     * Route Active Provider
     */
    Route::get('active-provider/{id}', 'ProviderController@active')->name('active.provider');
});
