<?php

use Armezit\GetCandy\Api\Http\Controllers\Orders\OrderController;
use Illuminate\Support\Facades\Route;

/**
 * Product routes.
 */
Route::controller(OrderController::class)->group(function () {
    Route::get('/{id}', 'show');
//    Route::get('', 'index');
});
