<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('products', [\App\Http\Controllers\ProductController::class, "getProducts"]);
Route::get('products/{productId}', [\App\Http\Controllers\ProductController::class, "getProductDetails"])->middleware(['auth:sanctum']);
Route::post('/register', \App\Http\Controllers\RegisterController::class);
Route::post('/login', \App\Http\Controllers\LoginController::class);
Route::post('/logout', \App\Http\Controllers\LogoutController::class);
Route::middleware('auth')->put('/my/update-Information', [\App\Http\Controllers\AccountUserController::class, 'updateUserInformation']);
Route::middleware('auth')->post('/my/update-image', [\App\Http\Controllers\AccountUserController::class, 'updateUserImage']);
Route::middleware('auth')->put('/my/update-password', [\App\Http\Controllers\AccountUserController::class, 'updatePassword']);

Route::get('/user', \App\Http\Controllers\UserController::class)->middleware(['auth:sanctum']);
Route::get('/cart/items', [\App\Http\Controllers\CartController::class, 'getCartItems'])->middleware(['auth:sanctum']);
Route::middleware('auth:sanctum')->get('/cart', [\App\Http\Controllers\CartController::class,'getCartItems']);
Route::post('/cart',[\App\Http\Controllers\CartController::class, 'storeProductToCart'])->middleware(['auth:sanctum']);
Route::put('/cart', [\App\Http\Controllers\CartController::class, 'updateCart'])->middleware(['auth:sanctum']);
Route::delete('/cart/{cartId}', [\App\Http\Controllers\CartController::class, 'deleteCart'])->middleware(['auth:sanctum']);


Route::get('/my/wishlist', [\App\Http\Controllers\WishlistController::class, 'getUserWishlist'])->middleware('auth:sanctum');
Route::post('/my/wishlist-add/{productId}', [\App\Http\Controllers\WishlistController::class, 'addToWishlist'])->middleware('auth:sanctum');
Route::delete('/my/wishlist/{productId}', [\App\Http\Controllers\WishlistController::class, 'removeFromWishlist'])->middleware('auth:sanctum');


Route::middleware('auth')->apiResource('/my/addresses', \App\Http\Controllers\AddressController::class);
Route::middleware('auth')->put('/my/addresses/set-default-address/{address}', [\App\Http\Controllers\AddressController::class, 'setDefaultAddress']);
