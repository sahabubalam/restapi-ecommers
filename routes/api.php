<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ColorController;
use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Api\SizeController;
use App\Http\Controllers\Api\CouponController;
use App\Http\Controllers\Api\AllStatusUpdateController;
use App\Http\Controllers\Api\Frontend\AllProductController;
use App\Http\Controllers\Api\Frontend\CartController;
use App\Http\Controllers\Api\Frontend\WishlistController;





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
Route::apiResource('/coupon', CouponController::class);
Route::get('/product/color/{id}', [TestController::class, 'productcolor']);
Route::get('/product/size/{id}', [TestController::class, 'productsize']);
//status update controller
Route::get('/coupon/status/{id}', [AllStatusUpdateController::class, 'couponstatus']);
Route::get('/product/status/{id}', [AllStatusUpdateController::class, 'productstatus']);
//frontend controller
Route::get('/product/by/category', [AllProductController::class, 'allProduct']);
Route::get('/getting/product/{id}', [AllProductController::class, 'GettingProduct']);
Route::get('/product/details/{id}', [AllProductController::class, 'ProductDetails']);
//add to cart
Route::post('/addtocart/{id}', [CartController::class, 'AddtoCart']);
Route::get('/getting/cart/{id}', [CartController::class, 'GetCartProduct']);

//product review
Route::post('/add/product/review', [AllProductController::class, 'AddProductReview']);
Route::get('/product/review/{id}', [AllProductController::class, 'GetProductReview']);
//product wishlist
Route::post('/add/wishlist/{id}', [WishlistController::class, 'AddWishlist']);
Route::get('/getting/wishlist/{id}', [WishlistController::class, 'GettingWishlist']);
