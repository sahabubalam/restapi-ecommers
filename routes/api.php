<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ColorController;
use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Api\SizeController;

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

Route::apiResource('/product', ProductController::class);
Route::apiResource('/category', CategoryController::class);
Route::apiResource('/color', ColorController::class);
Route::apiResource('/size', SizeController::class);
Route::get('/product/color/{id}', [TestController::class, 'productcolor']);