<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|F
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('baskets', [BasketController::class, 'index']);
Route::get('baskets/{user_id}/{item_id}', [BasketController::class, 'show']);
Route::post('baskets', [BasketController::class, 'store']);


Route::get('termekek_minden/{type_id}', [ProductController::class, 'termekTipOssz']);


Route::middleware('auth.basic')->group(function () {
    Route::get('bejel_termek_tipus', [ProductController::class, 'bejelentkezettTermekTipus']);
    // termekHozzadas
    Route::post('uj_termek/{item_id}', [ProductController::class, 'termekHozzadas']);
});
