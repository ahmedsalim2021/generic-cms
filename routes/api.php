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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);
Route::post('/logout', [\App\Http\Controllers\LoginController::class, 'logout']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::resource('operators', \App\Http\Controllers\OperatorController::class);
    Route::resource('entityTypes', \App\Http\Controllers\EntityTypeController::class);
    Route::resource('attributes', \App\Http\Controllers\AttributeController::class);
    Route::get('attributes/dataTypes', [\App\Http\Controllers\AttributeController::class, 'attributeDataType']);
    Route::post('attributes/{attribute}/assign-to-entity/{entityType}',
        [\App\Http\Controllers\AttributeController::class, 'assignToEntity']);


});
