<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BikeController;


Route::get('/', function () {
    return view('Home');
});

Route::get('form', [BikeController::class, 'ShowForm']);


Route::post('store', [BikeController::class, 'StoreData']);
