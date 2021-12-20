<?php

use App\Http\Controllers\Api\V1\DepartmentController;
use App\Http\Controllers\Api\V1\UserController;
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

//VERSION BASED APIs
Route::prefix('v1')->name('api.v1.')->group(function () {

    Route::get('/status', function () {
        return response()->json(['status' => 'OK']);
    })->name('status');

    Route::apiResource('departments', DepartmentController::class);

    Route::apiResource('users', UserController::class);
});

Route::prefix('v2')->name('api.v2.')->group(function () {
    Route::get('/status', function () {
        return response()->json(['status' => true]);
    })->name('status');
});


// It must be presented at the end of our routes
Route::fallback(function () {
    return response()->json([
        'message' => 'Not found'
    ], 404);
})->name('api.fallback');