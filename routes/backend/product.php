<?php

use App\Http\Controllers\Backend\ProductController;
use Tabuna\Breadcrumbs\Trail;


Route::group(['prefix' => 'products'], function () {
    Route::get('products', [ProductController::class, 'index'])
        ->name('products.index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push(__('Products'), route('admin.products.index'));
        });

    Route::get('create', [ProductController::class, 'create'])
        ->name('products.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail
                ->parent('admin.products.index')
                ->push(__('Create Product'), route('admin.products.create'));
        });

    Route::post('store', [ProductController::class, 'store'])
        ->name('products.store');
});
