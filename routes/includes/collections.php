<?php

use Armezit\GetCandy\Api\Http\Controllers\Collections\CollectionController;
use Illuminate\Support\Facades\Route;

/**
 * Collection routes.
 */
Route::controller(CollectionController::class)->group(function () {
    Route::get('', 'index');
    Route::get('/{id}', 'show');
});
