<?php

use Armezit\GetCandy\Api\Http\Controllers\Carts\CartController;
use Illuminate\Support\Facades\Route;

/**
 * Cart routes.
 */
Route::controller(CartController::class)->group(function () {
    Route::get('', 'index');
    Route::post('', 'add');
});
