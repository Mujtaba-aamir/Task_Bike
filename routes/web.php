<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BikeController;

Route::prefix('bikes')->group(function(){
    Route::view('/home', 'bike.home');
    Route::get('/create', [BikeController::class, 'createBike'])->name('bike.create');
    Route::post('/store', [BikeController::class, 'storeBike'])->name('bike.store');
    Route::get('/index', [BikeController::class, 'indexBike'])->name('bike.index');
    Route::get('/view/{id}', [BikeController::class, 'viewBike'])->name('bike.view');
    Route::get('/delete/{id}', [BikeController::class, 'deleteBike'])->name('bike.delete');
    Route::get('/edit/{id}', [BikeController::class, 'editBike'])->name('bike.edit');
    Route::post('/update/{id}', [BikeController::class, 'updateBike'])->name('bike.update');
});