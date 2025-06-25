<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BikeController;


Route::get('/', function () {
    return view('Home');
});

Route::get('form', [BikeController::class, 'ShowForm']);


Route::post('store', [BikeController::class, 'StoreData']);


Route::get('table', [BikeController::class, 'ShowTable']);


Route::get('/view/{id}', [BikeController::class, 'SingleBike'])->name('view');


Route::get('/delete/{id}', [BikeController::class, 'DeleteBike'])->name('delete');


Route::get('/update/{id}', [BikeController::class, 'Update'])->name('update');


Route::post('/update/bike/{id}', [BikeController::class, 'UpdateBike'])->name('update_bike');




