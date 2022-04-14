<?php

use Armezit\GetCandy\Api\Http\Controllers\Products\ProductController;
use Illuminate\Support\Facades\Route;

/**
 * Product routes.
 */
Route::controller(ProductController::class)->group(function () {
    //Route::get('products/{id}', '\GetCandy\Api\Core\Products\Actions\FetchProduct');
    Route::get('', 'index');
});
