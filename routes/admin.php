<?php

use App\Http\Controllers\Admin\ChannelController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'admin', 'as' => 'admin.'], function(){

    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // I can use resource() here, but I would rather not
    Route::group(['prefix' => 'channels', 'as' => 'channels.'], function(){
       Route::get('/', [ChannelController::class, 'index'])                          ->name('index');
       Route::get('/create', [ChannelController::class, 'create'])                   ->name('create');
       Route::post('/store', [ChannelController::class, 'store'])                    ->name('store');
       Route::get('/edit/{channel:slug}',[ChannelController::class, 'edit'])         ->name('edit');
       Route::put('/{channel:slug}/', [ChannelController::class, 'update'])          ->name('update');
       Route::delete('/{channel:slug}', [ChannelController::class, 'destroy'])       ->name('delete');
    });

    Route::group(['prefix' => 'tags', 'as' => 'tags.'], function(){
        Route::get('/', [TagController::class, 'index'])                          ->name('index');
        Route::get('/create', [TagController::class, 'create'])                   ->name('create');
        Route::post('/store', [TagController::class, 'store'])                    ->name('store');
        Route::get('/edit/{tag:slug}',[TagController::class, 'edit'])             ->name('edit');
        Route::put('/{tag:slug}/', [TagController::class, 'update'])              ->name('update');
        Route::delete('/{tag:slug}', [TagController::class, 'destroy'])           ->name('delete');
    });

});
