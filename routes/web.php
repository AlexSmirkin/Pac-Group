<?php

use App\Http\Controllers\CabinController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ShipController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('ships.index');
});

Route::resource('ships', ShipController::class);
Route::resource('cabin', CabinController::class);
Route::resource('gallery', GalleryController::class);

