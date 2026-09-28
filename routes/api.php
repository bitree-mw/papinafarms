<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->name('api.v1.')->group(function (): void {
    // Add versioned resource endpoints when their requirements are implemented.
    Route::prefix('customer')->name('customer.')->group(function (): void {
        // Future customer endpoints require auth:sanctum and authorization.
    });

    Route::prefix('buyer')->name('buyer.')->group(function (): void {
        // Future buyer endpoints require auth:sanctum and authorization.
    });

    Route::prefix('admin')->name('admin.')->group(function (): void {
        // Future admin endpoints require auth:sanctum and authorization.
    });
});
