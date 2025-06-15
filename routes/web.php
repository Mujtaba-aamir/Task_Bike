<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BikeController;

Route::get('/bike/create', function () {
    return view('bike.create');
});

Route::post('/bike/store', [BikeController::class, 'store']);

