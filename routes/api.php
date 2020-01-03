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


//Loading initial assets for home and guides & courses page
Route::get('/assets/office', 'AssetController@officeAssets')->name('assets.office');
Route::get('/assets/general', 'AssetController@generalAssets')->name('assets.general');
Route::get('/assets/web', 'AssetController@webDevAssets')->name('assets.webDev');
Route::get('/assets/front-end', 'AssetController@frontEndAssets')->name('assets.front-end');